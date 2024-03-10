<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use DB;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission::orderBy('id','DESC')->get();
        return view('admin.permission.index',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'label' => 'required|unique:roles,name',
            'group_name' => 'required|unique:roles,name',
        ]);

       // $role = Role::create(['name' => $request->input('name')]);
        $permission = new Permission();
        $permission->name =  $request['name'];
        $permission->label =  $request['label'];
        $permission->group_name =  $request['group_name'];
        $permission->save();
        toastr()->success('Permission Added successfully', 'Permission', ['timeOut' => 5000]);
        return redirect()->route('admin.permissions.list');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $permission = Permission::find($id);
        $permission->name =  $request['name'];
        $permission->label =  $request['label'];
        $permission->group_name =  $request['group_name'];
        $permission->save();
        toastr()->info('Permission Updated successfully', 'Permission', ['timeOut' => 5000]);
        return redirect()->route('admin.permissions.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        toastr()->error('Permission Deleted successfully', 'Permission', ['timeOut' => 5000]);
        return redirect()->route('admin.permissions.list');
    }
}
