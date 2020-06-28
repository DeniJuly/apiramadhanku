<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saran;

class SaranController extends Controller
{

    public function index()
    {
        $saran = Saran::select('saran.*','user.nama')
                        ->join('user', 'user.id', '=', 'saran.id_user')
                        ->orderBy('saran.id', 'DESC')
                        ->paginate(10);
        return view('saran', ['saran'   => $saran]);
    }
    public function addSaran(Request $request)
    {
        $this->validate($request, [
            'isi'       => 'required',
            'id_user'   => 'required'
        ]);

        $foto = $request->file('foto-saran');
        $image = '';
        if($foto){
            $image = $request->id_user . '_' . date('Y-m-d H-i-s') . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('img/saran', $image);
            $foto->move('img/saran', $image);
        }

        $saran = Saran::insert([
            'isi'       => $request->isi,
            'id_user'   => $request->id_user,
            'foto'      => $image
        ]);

        if( $saran ){
            return response()->json([
                'success'   => true,
                'message'   => 'success',
                'saran'     => $saran
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'failed'
            ]);
        }
    }
}
