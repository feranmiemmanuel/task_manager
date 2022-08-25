<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function authLogin(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $notification = array(
                'message' => 'Login successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('dashboard')
                ->with($notification);
        }else{
            $notification = array(
                'message' => 'Login failed!',
                'alert-type' => 'success'
            );
            return redirect()->route('login')
                ->with($notification);
        }
    }
    public function logout()
    {
        Auth::logout();
        $notification = array(
        'message' => 'Logged Out Successfully!',
        'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    }
}