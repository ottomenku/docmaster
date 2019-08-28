<?php
namespace App\Http\Controllers\Admin;

use App\Category;
use App\Doc;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class DocController extends Controller
{
    public static $configFile = 'appp'; // a config file neve ami felül írja az alap propertiket ha a getProp()-al kérjük le. ha felül akarjuk írni  a kulsnak meg kell egyeznie a property nevével
    public static $doc_path = 'doc'; //a dokumentumok mentésének helye a resources mappán belül
    public static $docprev_path = 'docprev'; //prev fileok helye a public mappán belül, a public és a resource  a getPath() ban változtatható
    public  $base_prev_img = ['pdf.png','file.png','doc.png']; // ezeket nem törli a prev img közül

    public function getProp($keyname)
    {return config(self::$configFile . '.' . $keyname) ?? self::$$keyname;}
    public static function getDocpath()
    {
        $docpath = config(self::$configFile . '.doc_path') ?? self::$doc_path;
        return resource_path($docpath) . '/';
    }
    public static function getDocPrevpath($base='')
    {
        $docprev_path = config(self::$configFile . '.docprev_path') ?? self::$docprev_path;
        if($base=='base'){return $docprev_path. '/';}
        else{ return public_path($docprev_path) . '/';}
       
    }
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $doc = Doc::with('category')->where('category_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('originalname', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doc = Doc::with('category')->latest()->paginate($perPage);
        }

        return view('admin.doc.index', compact('doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|
     */
    public function store(Request $request)
    {
        $path = self::getDocpath();
        $this->validate($request, [
            'file' => 'required',
            'file.*' => 'mimes:doc,pdf,docx,txt,xls',
        ]);
        $prev_image_array = ['pdf', 'doc'];
        $ext = $request->file->getClientOriginalExtension();
        $filename = rand(1111, 9999) . time() . '.' . $ext;
        $OriginalName = $request->file->getClientOriginalName();

        if (in_array($ext, $prev_image_array)) {$prev = $ext . '.png';} else { $prev = 'file.png';}

        $docdata = [
            'filename' => $filename,
            'name' => $OriginalName,
            'originalname' => $OriginalName,
            'type' => $ext,
            'prev' => $prev,
            'sizekb' => $request->file('file')->getSize()];
        Doc::create($docdata);

        request()->file->move($path, $filename);
        return response()->json(['uploaded' => $OriginalName]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $doc = Doc::findOrFail($id);

        return view('admin.doc.show', compact('doc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $data['doc'] = Doc::findOrFail($id);
        $data['categories'] = Category::all()->pluck('name', 'id');
        return view('admin.doc.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $doc = Doc::findOrFail($id);

        $this->validate($request, [
            //'path' => 'required'
        ]);
        $requestData = $request->all();

        if (Input::file()) {

            $image = Input::file('thumb');
            $ext = $request->thumb->getClientOriginalExtension();
            $prevname = $doc->filename . '.' . $ext;

           $prevpath=self::getDocPrevpath();
           $thumbpath=self::getDocPrevpath(). 'thumb/';
          
           if (!in_array($doc->prev , $this->base_prev_img)) {
                  if (file_exists($prevpath. $doc->prev)) {File::delete($prevpath. $doc->prev);}
                  if (file_exists($thumbpath . $doc->prev)) {File::delete($thumbpath . $doc->prev);}
           }
            Image::make($image->getRealPath())->save( $prevpath. $prevname);
            Image::make($image->getRealPath())->resize(100, 100)->save( $thumbpath. $prevname);
             $requestData['prev'] = $prevname;
        }

       
        unset($requestData['thumb']);
        $doc->update($requestData);

        return redirect('admin/doc')->with('flash_message', 'Doc updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $doc = Doc::findOrFail($id);
        $file =  self::getDocpath() . $doc->filename;
        $prew = self::getDocPrevpath()  . $doc->prev;
        $thumb =self::getDocPrevpath()  . 'thumb/' . $doc->prev;
        Doc::destroy($id);
        File::delete($file);
        File::delete($prew);
        File::delete($thumb);
        return redirect('admin/doc')->with('flash_message', 'Doc deleted!'.$file);
    }
    public function resetPrev($id)
    {
        $doc = Doc::findOrFail($id);
        $type = $doc->type ?? 'file';
        $newPrev = $type . '.png';

        $prew = self::getDocPrevpath()  . $doc->prew;
        $thumb = self::getDocPrevpath()  . 'thumb/' . $doc->prew;
        $doc->updated(['prev' => $newPrev]);
        File::delete($prew);
        File::delete($thumb);
        return redirect('admin/doc')->with('flash_message', 'Doc prev reset!');
    }

 
    public function convert($path)
    {
        $imagick = new \Imagick();
        // Reads image from PDF
        $imagick->readImage(resource_path('doc') . $path);

    }
}
