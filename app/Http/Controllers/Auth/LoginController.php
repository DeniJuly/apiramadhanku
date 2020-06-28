<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(!$token = auth()->attempt($request->only('username', 'password'))){
            return response(null, 401);
        }

        return response()->json(compact('token'));
    }

    public function checkUsername(Request $request)
    {
        $user = User::where(['username' => $request->username])->get();
        if($user){
            return response()->json([
                'success'   => true,
                'message'   => 'username is exist',
                'user'      => count($user)
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'username not found'
            ]);
        }
    }

    public function checkUsernameId(Request $request)
    {
        $user = User::where('username' , '=', $request->username)
                        ->where('id', '!=', $request->id)
                        ->get();
        if($user){
            return response()->json([
                'success'   => true,
                'message'   => 'username is exist',
                'user'      => count($user)
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'username not found'
            ]);
        }
    }

    public function daftar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'  => 'required|max:30',
            'username'  => 'required|max:10',
            'password'  => 'required|min:6',
            'id_tinggal'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'nama'  => $request->nama,
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
            'id_tinggal'=> $request->id_tinggal
        ]);

        $token = auth()->attempt($request->only('username','password'));

        return response()->json(compact('user','token'));

    }

    public function logout()
    {
        auth()->logout();
    }
}
