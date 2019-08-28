<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RoleTime;
use App\User;
use App\Permission;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoletimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $roles = RoleTime::where('note', 'LIKE', "%$keyword%")->orWhere('User_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $roles = RoleTime::latest()->paginate($perPage);
        }

        return view('admin.roletimes.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $data['users'] = User::pluck('name', 'id');
        $data['date1'] = User::pluck('name', 'id');
//   $today=\Carbon\Carbon::now()->format('Y-m-d') ;
$data['start']=Carbon::now()->format('Y-m-d') ;
$data['end']=Carbon::now()->addDay(30)->format('Y-m-d') ;
        return view('admin.roletimes.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        //$this->validate($request, ['name' => 'required']);
        $data=$request->all();
        $data['admin_id']=1;
        $data['role_id']=3;
        $role = RoleTime::create($data);


        return redirect('admin/roletimes')->with('flash_message', 'Role added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roletimes.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'name');

        return view('admin.roletimes.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required']);

        $role = Role::findOrFail($id);
        $role->update($request->all());
        $role->permissions()->detach();

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $role->givePermissionTo($permission);
            }
        }

        return redirect('admin/roletimes')->with('flash_message', 'Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        RoleTime::destroy($id);

        return redirect('admin/roletimes')->with('flash_message', 'Role deleted!');
    }
}
