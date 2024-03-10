<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:Admin');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // dd(Auth::user()->name);
        if (Auth::check()) {
            $user = Auth::user();
            return view('admin.dashboard', compact('user'),['pageName' => 'Dashboard']);
        } else {
            return redirect()->route('admin.login');
        }

        //return view('admin.dashboard');
    }

    public function adminLogin()
    {
        return view('admin.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

         $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
             return redirect()->route('admin.dashboard');
        }else{
             return redirect()->route('admin.login')->with('danger','Only Admin Login');
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
