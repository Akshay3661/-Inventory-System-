<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use DB;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:user-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('admin.users.index',compact('users'),['pageName' => 'Users']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$roles = Role::pluck('name','name')->all();
        //return view('admin.users.create',compact('roles'));
        return view('admin.users.create',['pageName' => 'Add New User']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required','unique:users',
            'password' => 'required','confirmed','string',
            'mono' => 'required',
            'emp_id' => 'required',
            'image' => 'required',
        ]);

        $user_img = time().'-'.$request['image']->getClientOriginalExtension();
        $img =  $request['image']->move('user_image',$user_img);

        $user = new User();
        $user->name =  $request['name'];
        $user->username =  $request['username'];
        $user->email =  $request['email'];
        $user->mono =  $request['mono'];
        $user->emp_id =  $request['emp_id'];
        $user->image =   $user_img;
        $user->password = Hash::make($request['password']);
        //$user->assignRole(implode(', ', $request['roles']));
        $user->save();
        toastr()->success('User Added successfully', 'User', ['timeOut' => 5000]);
        return redirect()->route('admin.users.list');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): view
    {
        // $user = User::find($id);
        // //$role = Role::find($id);
        // $permission = Permission::get();
        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        //     ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //     ->all();

        // return view('admin.users.show',compact('user','permission','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);
        //$roles = Role::pluck('name','name')->all();
        //$userRole = $user->roles->pluck('name','name')->all();
        //return view('admin.users.edit',compact('user','roles','userRole'));
        return view('admin.users.edit',compact('user'),['pageName' => 'Edit User']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required','unique:users',
            'mono' => 'required',
            'emp_id' => 'required',
        ]);
        //dd($request->all());
        $user =  User::find($id);
        $user->name =  $request['name'];
        $user->username =  $request['username'];
        $user->email =  $request['email'];
        $user->mono =  $request['mono'];
        $user->emp_id =  $request['emp_id'];
        /*image edit*/
        if(empty($request['image'])){
            $user->image = $user->image;  //image fetch db
        }else{
            //new add image edit time
            $user_img = time().'-'.$request['image']->getClientOriginalExtension();
            $img =  $request['image']->move('user_image',$user_img);
            $user->image =   $user_img;
        }

        //DB::table('model_has_roles')->where('model_id',$id)->delete();
        //$user->assignRole(implode(', ', $request['roles']));
        //$user->assignRole($request['roles']);
        $user->save();
        toastr()->info('User Updated successfully', 'User', ['timeOut' => 5000]);
        return redirect()->route('admin.users.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //dd('sdfsd');
        User::find($id)->delete();
        toastr()->error('User Deleted successfully', 'User', ['timeOut' => 5000]);
        return redirect()->route('admin.users.list');
    }

}
