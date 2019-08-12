<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use App\Doc;
use Illuminate\Http\Request;
use Image;

class DocController extends Controller
{
    public function prewupload(Request $request){
        $path= public_path('docprew');
     /*   $this->validate($request, [

            'prewfile' => 'required',

            'prewfile.*' => 'mimes:jpg,png,bmp'

    ]);

    $prev_image_array=['jpg','png','bmp'];
    $ext=$request->prewfile->getClientOriginalExtension();
    $filename = rand(1111,9999).time().'.'.$ext;
    if(in_array($ext, $prev_image_array)){$prev=$ext.'png';}else{$prev='file.png';}
    **/
    

        $this->validate($request, [
            'prewfile' => 'required',
            'prewfile.*' => 'mimes:jpg,png,bmp'
    ]);
/*
    $docdata=[
    'filename'=> $filename,
    'name'=>$OriginalName,
    'originalname'=>$OriginalName,
    'type'=>$ext,
    'prev'=>$prev,
    'sizekb'=>$request->file('file')->getSize()];
    Doc::create($docdata);
    */	
      //  request()->file->move(resource_path('doc'), $OriginalName);
      try {
    
     $image = $request->file('prewfile');
     $filename    = $image->getClientOriginalName();
     
    // save thumb  
     $image_resize = Image::make($image->getRealPath());              
     $image_resize->resize(100, 100);
     $image_resize->save(public_path('docprew/thumb/' .$filename));
    //save image
    request()->prewfile->move($path, $filename );

    	return response()->json(['uploaded' => $filename,'message' => 'feltoltve']);
      }
      catch(Exception $e) {
        return response()->json(['error' => $e->getMessage(),'message' => 'feltolés nem sikerült']);
      }
       
    }
    public static function getDocFolder()
    { return resource_path('doc'); }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $doc = Doc::where('category_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('imgpath', 'LIKE', "%$keyword%")
                ->orWhere('path', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doc = Doc::latest()->paginate($perPage);
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
        return view('admin.doc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'path' => 'required'
		]);
        $requestData = $request->all();
        
        Doc::create($requestData);

        return redirect('admin/doc')->with('flash_message', 'Doc added!');
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
        $doc = Doc::findOrFail($id);

        return view('admin.doc.edit', compact('doc'));
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
        $this->validate($request, [
			'path' => 'required'
		]);
        $requestData = $request->all();
        
        $doc = Doc::findOrFail($id);
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
        Doc::destroy($id);
        $file =self::$path. Doc::findOrFail($id)->filename;
        File::delete($file);
        return redirect('admin/doc')->with('flash_message', 'Doc deleted!');
    }
}
