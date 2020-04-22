<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class customauthcontroller extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'password' => 'required|string', //|confirmed
            'username' => 'required|string', 
        ]);

        $cre = $request->only('username','password');

        if(!$token=JWTAuth::attempt($cre)){
            return ['result'=>'2'];
        }

        $user = User::where('username','=',$request->username)->first();

        return ['token'=>$token, 'username'=>$request->username, 'id'=>$user->id];

    }

    public function reg(Request $request){
        $this->validate($request, [
            'email' => 'required|string|email|max:100',
            'password' => 'required|string', //|confirmed
            'username' => 'required|string', 
        ]);
        //create
       $user = new User;
       $user->username = $request->username;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->save();
       
        //response
        return 1;
    }
}
