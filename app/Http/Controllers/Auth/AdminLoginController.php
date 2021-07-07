<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');

    }
    public function index(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        return "OK";
    }
}
