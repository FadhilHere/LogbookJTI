<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
	    if (Auth::check()) {
		                switch (Auth::user()->level) {
					                case 'admin':
								                    return redirect('/admin');
										                        break;
										                    case 'superadmin':
													                        return redirect('/superadmin/dashboard');
																                    break;
																                default:
																                    return redirect('/admin');
																		                }
				        }
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            // Jika login berhasil
            $user = auth()->user();
            session(['username' => $user->username]);

            if ($user->level === 'dosen') {
                return redirect()->route('admin.index'); // Ganti dengan nama route yang sesuai
            } elseif ($user->level === 'ail') {
                return redirect()->route('admin.index'); // Ganti dengan nama route yang sesuai
            } elseif ($user->level === 'superadmin') {
                return redirect()->route('superadmin.dashboard'); // Ganti dengan nama route yang sesuai
            }
        }

	return redirect()->route('login')->withInput()->withErrors(['login' => 'Username/password Salah.']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
