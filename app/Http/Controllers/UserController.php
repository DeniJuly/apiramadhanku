<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getUser(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'id'        => $user->id,
            'nama'      => $user->nama,
            'username'  => $user->username,
            'id_tinggal'    => $user->id_tinggal,
            'id_quran'    => $user->id_quran,
            'foto_profile'  => $user->foto_profile
        ]);
    }

    public function editFoto (Request $request)
    {
        $user = User::find($request->id_user);
        if($user){
            $file = $request->file('foto-profile');
            if($user->foto_profile != 'default.svg'){
                File::delete('img/foto-profile/' . $user->foto_profile);
            }
            $image = $user->username . '.' . $file->getClientOriginalExtension();
            $file->storeAs('img/foto-profile', $image);
            if($file->move('img/foto-profile', $image)){
                $user->foto_profile = $image;
                $user->save();
                return response()->json([
                    'success'   => true,
                    'message'   => 'success',
                    'user'      => $user
                ]);
            } else {
                return response()->json([
                    'success'   => false,
                    'message'   => 'failed upload file'
                ]);
            }

        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'user not found'
            ]);
        }
    }

    public function editProfile(Request $request)
    {
        $user = User::find($request->id_user);
        if( $user ){
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->id_tinggal = $request->id_tinggal;
            if( $user->save() ){
                return response()->json([
                    'success'   => true,
                    'message'   => 'success',
                    'user'      => $user
                ]);
            } else {
                return response()->json([
                    'success'   => false,
                    'message'   => 'failed'
                ]);
            }
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'user not found'
            ]);
        }
    }

    public function editQuran(Request $request)
    {
        $user = User::find($request->id_user);
        if( $user ){
            $user->id_quran = $request->id_quran;
            if( $user->save() ){
                return response()->json([
                    'success'   => true,
                    'message'   => 'success',
                    'user'      => $user
                ]);
            } else {
                return response()->json([
                    'success'   => false,
                    'message'   => 'failed'
                ]);
            }
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'user not found'
            ]);
        }
    }
}
