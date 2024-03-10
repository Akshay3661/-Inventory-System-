<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
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
            return view('admin.profile',['pageName' => 'Profile'])->with($data);

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
        // $user->gender = $request['gender'];
        // $user->mono = $request['mono'];
        $user->save();
        toastr()->info('Profile Updated Successfully', 'Profile', ['timeOut' => 5000]);
        return redirect()->route('profile')->with('message','Edit Profile Successfully');
    }

    public function passwordUpdate(Request $request, string $id)
    {
        // $request->validate([
        //    'password' => 'required|confirmed|min:6',
        // ]);
       // dd($request['password'],$request['password_confirmation']);
       //dd($id );
        $id = auth()->user()->id;
       $user = User::find($id);
       // Verify the current password
       if($request->input('oldpassword') == ''){
            toastr()->warning('Current Password is Not Blank', 'Password', ['timeOut' => 5000]);
            return redirect()->route('profile');
       }
       else
       {
            if (!Hash::check($request->input('oldpassword'), $user->password)) {
                toastr()->warning('Current Password is incorrect', 'Password', ['timeOut' => 5000]);
                return redirect()->route('profile');
            }

            if($request['newpassword'] != '')
            {
                if($request['newpassword'] == $request['confirmpassword']){
                    $user->password = Hash::make($request['newpassword']);
                    $user->save();
                    toastr()->info('Password Updated successfully', 'Password', ['timeOut' => 5000]);
                    return redirect()->route('profile');
                }else{
                    toastr()->warning('The New Password & Confirmation Password does not match', 'Password', ['timeOut' => 5000]);
                    return redirect()->route('profile');
                }
            }
            else
            {
                toastr()->warning('The New Password not Blank', 'Password', ['timeOut' => 5000]);
                return redirect()->route('profile');
            }
       }
    }

    public function emailUpdate(Request $request, $id)
    {
       $id = auth()->user()->id;
       $user = User::find($id);
       // Verify the current password
       if($request['email'] == ''){
            toastr()->warning('Current Email is Not Blank', 'Email', ['timeOut' => 5000]);
            return redirect()->route('profile');
       }
       else
       {
            if($request['new_email'] != '')
            {
                if($user->email === $request['email']){
                    $user->email = $request['new_email'];
                    $user->save();
                    toastr()->info('Email Updated successfully', 'Email', ['timeOut' => 5000]);
                    return redirect()->route('profile')->with('message', 'Email updated successfully.');
                }
                else
                {
                    toastr()->warning('Current Email is Not Match', 'Email', ['timeOut' => 5000]);
                    return redirect()->route('profile');
                }
            }
            else
            {
                toastr()->warning('The new Email does not Change', 'Email', ['timeOut' => 5000]);
                return redirect()->route('profile');
            }
       }
    }
    public function profileImage(Request $request, string $id)
    {

        $this->validate($request, [
            'name' => 'required',
            //'email' => 'required','unique:users',
            'mono' => 'required',
        ]);

        $user = User::find($id);
        //dd($user->profile_image);

        if(empty($request['image'])){
            $user->image = $user->image;  //image fetch db
        }else{
            //new add image edit time
            $fileName = time().'-'.$request['image']->getClientOriginalExtension();
            $img =  $request['image']->move('user_image',$fileName);
            $user->image = $fileName;
        }
        $user->name = $request['name'];
        //$user->email = $request['email'];
        $user->mono = $request['mono'];
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
