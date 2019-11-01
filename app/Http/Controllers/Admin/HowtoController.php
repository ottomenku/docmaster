<?php
namespace App\Http\Controllers\Admin;

use App\Howcat;
use App\Howto;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class HowtoController extends Controller
{ 
  use \App\Traits\StatPropertyHandler; //getProp('howto_path')
    
    private  $configFile = 'app'; // a config file neve ami felül írja az alap propertiket ha a getProp()-al kérjük le. ha felül akarjuk írni  a kulsnak meg kell egyeznie a property nevével
  //config file  felülírja--------------
    public  $howto_path;     //= 'resources/howto/'; //a dokumentumok mentésének helye 
    public  $howtoprev_path;  //= 'public/howtoprev/'; //prev fileok helye  
     public  $howtoprev_thumb_path;     //='public/howtoprev/thumb/';
    public  $base_prev_img ;//= ['pdf.png','file.png','howto.png']; // ezeket nem törli a prev img közül


public function __construct()
{
    $this->howto_path = config($this->configFile . '.howto_path') ?? $this->howto_path ;
    $this->howtoprev_path = config($this->configFile . '.howtoprev_path') ?? $this->howtoprev_path ;
     $this->howtoprev_thumb_path = config($this->configFile . '.howtoprev_thumb_path') ?? $this->howtoprev_thumb_path ;
    $this->base_prev_img = config($this->configFile . '.base_prev_img') ?? $this->base_prev_img ;
}

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $howto = Howto::with('howcat')->where('howcat_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('originalname', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $howto = Howto::with('howcat')->latest()->paginate($perPage);
        }

        return view('admin.howto.index', compact('howto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['howcat'] = Howcat::all();
        $data['id'] =0;
        return view('admin.howto.fileupload',compact('data'));
    }
    public function createWithCat($id)
    {
        $data['howcat'] = Howcat::all();
        $data['id'] =$id;
        return view('admin.howto.fileupload',compact('data'));
    }
    /**
     * Store a newly created resource  in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|
     */
    public function store(Request $request)
    { 
        //$path =$this->howto_path; 
        $path =resource_path('howto');
        $this->validate($request, [
            'file' => 'required',
            'file.*' => 'mimes:howto,pdf,howtox,txt,xls',
        ]);
        $prev_image_array = ['pdf', 'howto'];
        $ext = $request->file->getClientOriginalExtension();
        $filename = rand(1111, 9999) . time() . '.' . $ext;
        $OriginalName = $request->file->getClientOriginalName();

        if (in_array($ext, $prev_image_array)) {$prev = $ext . '.png';} else { $prev = 'file.png';}

        $howtodata = [
            'filename' => $filename,
            'howcat_id'=>$request->cat_id,
            'name' => $OriginalName,
            'originalname' => $OriginalName,
            'type' => $ext,
            'prev' => $prev,
            'sizekb' => $request->file('file')->getSize()];
        Howto::create($howtodata);
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
        $howto = Howto::findOrFail($id);

        return view('admin.howto.show', compact('howto'));
    }
    public function prev($id)
    {
        $howto = Howto::findOrFail($id);
      return response('<img src="'.url('howtoprev/'.$howto->prev).'" height="600px" width="100%">');
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
        $data['howto'] = Howto::findOrFail($id);
        $data['howcats'] = Howcat::all()->pluck('name', 'id');
        return view('admin.howto.edit', compact('data'));
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

        $howto = Howto::findOrFail($id);

        $this->validate($request, [
            //'path' => 'required'
        ]);
        $requestData = $request->all();

        if (Input::file()) {

            $image = Input::file('thumb');
            $ext = $request->thumb->getClientOriginalExtension();
            $prevname = $howto->filename . '.' . $ext;

           $prevpath=public_path($this->howtoprev_path);
           $thumbpath=public_path($this->howtoprev_thumb_path); 
          
           if (!in_array($howto->prev , $this->base_prev_img)) {
                  if (file_exists($prevpath. $howto->prev)) {File::delete($prevpath. $howto->prev);}
                  if (file_exists($thumbpath . $howto->prev)) {File::delete($thumbpath . $howto->prev);}
           }
            Image::make($image->getRealPath())->save($prevpath. $prevname);
            Image::make($image->getRealPath())->resize(100, 100)->save( $thumbpath. $prevname);
             $requestData['prev'] = $prevname;
        }

       
        unset($requestData['thumb']);
        $howto->update($requestData);

        return redirect('admin/howto')->with('flash_message', 'howto updated!');
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
        $howto = Howto::findOrFail($id);
        $file = $this->howto_path. $howto->filename;
        $prew = public_path($this->howtoprev_path). $howto->prev;
        $thumb =public_path($this->howtoprev_thumb_path). $howto->prev;
        Howto::destroy($id);
        File::delete($file);
        if(!in_array($howto->prev,$this->base_prev_img)){
            File::delete($prew);
            File::delete($thumb);
        }
       
        return redirect('admin/howto')->with('flash_message', 'howto deleted!'.$file);
    }
    /**
     * A preview et törli és visszaírja az alap nézetet ext.png
     */
    public function resetPrev($id)
    {
        $howto = Howto::findOrFail($id);
        $type = $howto->type ?? 'file';
        $newPrev = $type . '.png';

        $prew = public_path($this->howtoprev_path). $howto->prew;
        $thumb = public_path($this->howtoprev_thumb_path). $howto->prew;
        $howto->updated(['prev' => $newPrev]);
        if(!in_array($howto->prev,$this->base_prev_img)){
            File::delete($prew);
            File::delete($thumb);
        }
        return redirect('admin/howto')->with('flash_message', 'howto prev reset!');
    }

 
    public function convert($path)
    {
        $imagick = new \Imagick();
        // Reads image from PDF
        $imagick->readImage(resource_path('howto') . $path);

    }
}
