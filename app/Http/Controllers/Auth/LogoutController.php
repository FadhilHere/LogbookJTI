<?php

// app/Http/Controllers/Auth/LogoutController.php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        session()->forget('username');

        return redirect('/');
    }
}

