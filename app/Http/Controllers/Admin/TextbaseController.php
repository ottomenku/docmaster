<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Textbase;
use Illuminate\Http\Request;

class TextbaseController extends Controller
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
            $textbase = Textbase::where('code', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orWhere('pub', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $textbase = Textbase::latest()->paginate($perPage);
        }

        return view('admin.textbase.index', compact('textbase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.textbase.create');
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
			'code' => 'required'
		]);
        $requestData = $request->all();
        
        Textbase::create($requestData);

        return redirect('admin/textbase')->with('flash_message', 'Textbase added!');
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
        $textbase = Textbase::findOrFail($id);

        return view('admin.textbase.show', compact('textbase'));
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
        $textbase = Textbase::findOrFail($id);

        return view('admin.textbase.edit', compact('textbase'));
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
			'code' => 'required'
		]);
        $requestData = $request->all();
        
        $textbase = Textbase::findOrFail($id);
        $textbase->update($requestData);

        return redirect('admin/textbase')->with('flash_message', 'Textbase updated!');
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
        Textbase::destroy($id);

        return redirect('admin/textbase')->with('flash_message', 'Textbase deleted!');
    }
}
