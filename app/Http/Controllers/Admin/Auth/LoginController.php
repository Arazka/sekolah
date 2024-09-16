<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.auth.login', [
            'title' => 'Login',
            'active' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        // Password admin: Admin@123

        // $validator = Validator::make($request->all(),[
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // $credentials = request(['username', 'password']);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            // return redirect()->route('dashboard');
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('loginError', 'Username atau Password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/admin/login');
    }
}
