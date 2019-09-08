<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pay;
use Illuminate\Http\Request;

class PaysController extends Controller
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
            $pays = Pay::where('User_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pays = Pay::latest()->paginate($perPage);
        }

        return view('pays.index', compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pays.create');
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
			'User_id' => 'required'
		]);
        $requestData = $request->all();
        
        Pay::create($requestData);

        return redirect('pays')->with('flash_message', 'Pay added!');
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
        $pay = Pay::findOrFail($id);

        return view('pays.show', compact('pay'));
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
        $pay = Pay::findOrFail($id);

        return view('pays.edit', compact('pay'));
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
			'User_id' => 'required'
		]);
        $requestData = $request->all();
        
        $pay = Pay::findOrFail($id);
        $pay->update($requestData);

        return redirect('pays')->with('flash_message', 'Pay updated!');
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
        Pay::destroy($id);

        return redirect('pays')->with('flash_message', 'Pay deleted!');
    }
}
