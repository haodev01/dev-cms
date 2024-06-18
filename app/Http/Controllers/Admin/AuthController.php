<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register()
    {
        return  view('admin.pages.register');
    }
    public function login()
    {
        return view('admin.pages.login');
    }
    public function doReigster(RegisterRequest $request)
    {
        $data = $request->all();
        $this->create($data);
    }
    public function create(array $data)
    {
        $user =  Admin::create([
            'username' => $data['username'],
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        $user->assignRole($data['roles']);
        return $user;
    }
    public function doLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('success', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
