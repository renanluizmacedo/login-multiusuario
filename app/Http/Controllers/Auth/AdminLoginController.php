<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');

    }
    public function index(){
        return view('auth.admin-login');
    }

    public function login(Request $request){

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ]; 

        $authOK = Auth::guard('admin')->attempt($credentials, $request->remember);


        if($authOK){
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInputs($request->only('email','remember'));
    }
}
