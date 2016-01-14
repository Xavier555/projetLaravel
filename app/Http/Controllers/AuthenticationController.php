<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class AuthenticationController extends Controller
{
    public function endOfSession()
    {
        Auth::logout();
        return redirect('/');
    }

    public function userRegister()
    {
        Auth::register();
        return redirect('/tasks');
    }

    public function getAbout()
    {
        return redirect('/aboutMe');
    }
}
