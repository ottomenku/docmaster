<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use App\Post;
use App\Postcat;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public $base_prev_img=['file.png','noimage.png'];
   private  $configFile = 'app'; // a config file neve ami felül írja az alap propertiket ha a getProp()-al kérjük le. ha felül akarjuk írni  a kulsnak meg kell egyeznie a property nevével
   //config file  felülírja--------------
     public  $image_path;     //'public/ mappán belül
      public  $image_thumb_path;     
 
 
 public function __construct()
 {
     $this->image_path= config($this->configFile . '.postimage_path') ?? $this->image_path ;
     $this->image_thumb_path =$this->image_path.'thumb/'  ?? $this->image_thumb_path ;
 
 }
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
            $post = Post::where('name', 'LIKE', "%$keyword%")
                ->orWhere('intro', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->orWhere('pub', 'LIKE', "%$keyword%")
                ->orWhere('postcat_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $post = Post::with('postcat')->latest()->paginate($perPage);
        }

        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $post['postcat'] =  Postcat::all()->pluck('name', 'id'); 
        return view('admin.post.create', compact('post'));
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
			'name' => 'required',
			'text' => 'required'
		]);
        $requestData = $request->all();
        
        
        if (Input::file()) {

            $image = Input::file('image');
            $ext = $request->image->getClientOriginalExtension();
            $imagename = rand(1111, 9999) . time() . '.' . $ext ;

            Image::make($image->getRealPath())->save($this->image_path. $imagename);
            Image::make($image->getRealPath())->resize(100, 100)->save( $this->image_thumb_path. $imagename);
             $requestData['image'] = $imagename;
        }
        Post::create($requestData);

        return redirect('admin/post')->with('flash_message', 'Post added!');
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
        $post = Post::findOrFail($id);

        return view('admin.post.show', compact('post'));
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
      //  $post = Post::findOrFail($id);
        $post = Post::with('postcat')->findOrFail($id);
        $post['postcat'] =  Postcat::all()->pluck('name', 'id');
        return view('admin.post.edit', compact('post'));
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
			'name' => 'required',
			'text' => 'required'
		]);
        $requestData = $request->all();
        
        $post = Post::findOrFail($id);
   
        if (Input::file()) {

            $image = Input::file('image');
            $ext = $request->image->getClientOriginalExtension();
            $imagename = rand(1111, 9999) . time() . '.' . $ext ;
            $imagepath=$this->image_path;
            $thumbpath=$this->image_thumb_path; 
          
           if (!in_array($post->image , $this->base_prev_img)) {
                  if (file_exists($imagepath. $post->image)) {File::delete($imagepath. $post->image);}
                  if (file_exists($thumbpath . $post->image)) {File::delete($thumbpath . $post->image);}
           }
            Image::make($image->getRealPath())->save($imagepath. $imagename);
            Image::make($image->getRealPath())->resize(100, 100)->save( $thumbpath. $imagename);
             $requestData['image'] = $imagename;
        }

        $post->update($requestData);

        return redirect('admin/post')->with('flash_message', 'Post updated!');
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
        $post = Post::findOrFail($id);
        $prew = $this->image_path. $post->image;
        $thumb =$this->image_thumb_path. $post->image;
        Post::destroy($id);
        if(!in_array($post->image,$this->base_prev_img)){
            File::delete($prew);
            File::delete($thumb);
        }
        return redirect('admin/post')->with('flash_message', 'Post deleted!');
    }
}
