<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\howcat;
use App\Role;
use Illuminate\Http\Request;

class HowcatController extends Controller
{
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
            $howcat = Howcat::where('order_id', 'LIKE', "%$keyword%")
                ->orWhere('days', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $howcat = Howcat::latest()->paginate($perPage);
        }

        return view('admin.howcat.index', compact('howcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
   /* public function create()
    {
       $data['roles']=Role::pluck('name','id');
        return view('admin.howcat.create',compact('data'));
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
   /* public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        Howcat::create($requestData);

        return redirect('admin/howcat')->with('flash_message', 'howcat added!');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $howcat = Howcat::findOrFail($id);

        return view('admin.howcat.show', compact('howcat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
 /* public function edit($id)
    {
        $howcat = Howcat::findOrFail($id);
        $data['roles']=Role::pluck('name','id');
        return view('admin.howcat.edit', compact('howcat','data'));
    }**/

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
   /* public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        $howcat = Howcat::findOrFail($id);
        $howcat->update($requestData);

        return redirect('admin/howcat')->with('flash_message', 'howcat updated!');
    }**/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
/*   public function destroy($id)
    {
        Howcat::destroy($id);

        return redirect('admin/howcat')->with('flash_message', 'howcat deleted!');
    }*/
}
