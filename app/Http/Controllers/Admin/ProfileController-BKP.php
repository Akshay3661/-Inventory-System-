<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\WelcomeEmail;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

            $id = Auth::user()->id;
            $user = User::find($id);
            $data = compact('user');
            return view('profile')->with($data);

            // $admin_id = Auth::guard('admin')->user()->id;
            // $admin = Admin::find($admin_id);
            // $data = compact('admin');
            // return view('profile')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->gender = $request['gender'];
        $user->mono = $request['mono'];
        $user->save();
        toastr()->info('Profile Updated successfully', 'Profile', ['timeOut' => 5000]);
        return redirect()->route('profile');
    }

    public function passwordUpdate(Request $request, string $id)
    {
        // $request->validate([
        //    'password' => 'required|confirmed|min:6',
        // ]);
       // dd($request['password'],$request['password_confirmation']);

       $user = User::find($id);
        if($request['password'] === $request['password_confirmation']){
            //dd('no2');
                $user->password = Hash::make($request['password']);
                $user->save();

        }else{
            toastr()->warning('Password Not Updated', 'Password', ['timeOut' => 5000]);
            return redirect()->route('profile');
        }
        toastr()->info('Password Updated successfully', 'Password', ['timeOut' => 5000]);
        return redirect()->route('profile');
    }

    public function profileImage(Request $request, string $id)
    {
        $user = User::find($id);
        //dd($user->profile_image);

        $fileName = time().'-'.$request['profile_image']->getClientOriginalExtension();
        //dd($fileName);
        $img =  $request['profile_image']->move('user_image',$fileName);
        $user->profile_image = $fileName;
        $user->save();
        toastr()->info('Profile Updated successfully', 'Profile', ['timeOut' => 5000]);
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
