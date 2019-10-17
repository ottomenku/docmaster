<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Billingdata;
use Illuminate\Http\Request;

class BillingdataController extends Controller
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
            $billingdata = Billingdata::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('fullname', 'LIKE', "%$keyword%")
                ->orWhere('cardname', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('zip', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('tel', 'LIKE', "%$keyword%")
                ->orWhere('adosz', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $billingdata = Billingdata::latest()->paginate($perPage);
        }

        return view('admin.billingdata.index', compact('billingdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.billingdata.create');
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
			'user_id' => 'required',
			'fullname' => 'required',
			'cardname' => 'required',
			'city' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        Billingdata::create($requestData);

        return redirect('admin/billingdata')->with('flash_message', 'Billingdata added!');
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
        $billingdata = Billingdata::with('user')->findOrFail($id);

        return view('admin.billingdata.show', compact('billingdata'));
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
        $billingdata = Billingdata::findOrFail($id);

        return view('admin.billingdata.edit', compact('billingdata'));
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
			'user_id' => 'required',
			'fullname' => 'required',
			'cardname' => 'required',
			'city' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        $billingdata = Billingdata::findOrFail($id);
        $billingdata->update($requestData);

        return redirect('admin/billingdata')->with('flash_message', 'Billingdata updated!');
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
        Billingdata::destroy($id);

        return redirect('admin/billingdata')->with('flash_message', 'Billingdata deleted!');
    }
}
