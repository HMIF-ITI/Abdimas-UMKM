<?php

namespace App\Http\Controllers;

use App\Models\PelakuUmkm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function userregister()
    {
        return view('userregister');
    }

    public function ownerregister()
    {
        return view('ownerregister');
    }

    public function douserregister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'string'],
            'nik' => ['required', 'string'],
            'address' => ['required', 'string', 'max:150'],
        ]);

        // 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'phone_number' => $request->phone_number,
            'nik' => $request->nik,
            'address' => $request->address,
        ]);

        // 
        Auth::login($user);

        return redirect('/login');
    }

    public function doownerregister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:' . PelakuUmkm::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'string'],
            'nik' => ['required', 'string'],
            'address' => ['required', 'string', 'max:150'],
        ]);

        // 
        $pelakuumkm = PelakuUmkm::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'nik' => $request->nik,
            'address' => $request->address,
        ]);

        // 
        Auth::login($pelakuumkm);

        return redirect('/login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("adminindex");
        }

        if (Auth::guard('pelakuumkm')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("umkmindex");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
