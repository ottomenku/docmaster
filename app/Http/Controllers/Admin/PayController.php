<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\Pay;
use App\Pay;
use App\Role;
use App\Roletime;
use Illuminate\Http\Request;

class PayController extends Controller
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
            $pays = Pay::where('role_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->latest()->with('user')->paginate($perPage);
        } else {
            $pays = Pay::latest()->with('user')->paginate($perPage);
        }

        return view('admin.pay.index', compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       $data['roles']=Role::pluck('name','id');
        return view('admin.pay.create',compact('data'));
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        Pay::create($requestData);

        return redirect('admin/pay')->with('flash_message', 'Pay added!');
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
        $pay = Pay::with('user','billingdata','roletime')->findOrFail($id);
        $roletime=Roletime::with('role')->where('pay_id',$pay->id)->first();

        return view('admin.pay.show', compact('pay','roletime'));
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
        $data['roles']=Role::pluck('name','id');
        return view('admin.pay.edit', compact('Pay','data'));
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        $Pay = Pay::findOrFail($id);
        $Pay->update($requestData);

        return redirect('admin/pay')->with('flash_message', 'Pay updated!');
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

        return redirect('admin/pay')->with('flash_message', 'Pay deleted!');
    }
}
