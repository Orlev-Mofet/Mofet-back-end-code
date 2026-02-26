<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;

use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|exists:admins',
            'password'=>'required|min:8'
        ]);
        if( Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::guard('admin')->user()->active === "1"){
                return redirect(route('admin-dashboard'));
            } else {
                return redirect()
                    ->back()
                    ->withErrors(['state' => 'Your account is inactive.']);
            }
        }
        return redirect()
            ->back()
            ->withInput($request->only('email','remember'))
            ->withErrors(['password' => 'The password is incorrect.']);
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::guard('admin')->logout();

        return redirect('/admin');
    }



    function showSignUpForm()  {
        return view('admin.auth.admin-register');
    }

    function signup(Request $request) {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required',
            'condition_accept' => 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        // Auth::guard('admin')->loginUsingId($check->id);

        return redirect("/admin")->withSuccess('Great! You have Successfully loggedin');
    }

    public function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
