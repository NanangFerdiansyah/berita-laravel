<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    

    



    public function authenticated()
    {
        if(Auth::user()->role_as == '0') //0=Admin  
        {
            return response()->json(['message' => 'You are Logged in as Admin', 'redirect' => 'admin/dashboard']);
        }
        else {
            return response()->json(['message' => 'You are Logged in as User', 'redirect' => '/home']);
        }
    }



    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

}
