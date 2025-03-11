<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    /**
     * ini Function untuk proses login
     */
    public function index()
    {
        return view('Auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Wajib diisi!!',
            'email.email' => 'type harus @gmail.com',
            'email.exists' => 'Maaf email belum terdaftar',

            'password.required' => 'wajib diisi!!!',
            'password.min' => 'Minimal 6 karakter',
        ]);

        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
            
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);

            Alert::success('Success', 'Login Berhasil');

            return redirect('/home');

        } else {

            Alert::error('Error', 'Periksa Kembali email/password Anda');

            return redirect()->back()->withErrors([
                'email' => 'Email is wrong, please check again!!!',
                'password' => 'Password is Invalid, please check again!!!',
            ]);
        }
    }

    public function log_keluar()
    {
        Auth::logout();
        return redirect('/');
    }


    /**
     * ini function untuk proses Register
     */
    public function register()
    {
        return view('Auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:5|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $saveData = new User();
        $saveData -> name = $request->name;
        $saveData -> email = $request->email;
        $saveData -> password = Hash::make($request->password);
        $saveData->save();


        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
            
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);

            
            Alert::success('Success', 'Registrasi Berhasil');

            return redirect('/home');

        } else {

            Alert::error('Error', 'Periksa Kembali Data Anda');

            return redirect()->back()->with([
                'message',
                'Register Gagal, Silahkan Ulangi Proses!!!',
            ]);
        }
        
    }

}
