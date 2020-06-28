<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ibadah;

class IbadahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getAll()
    {
        $ibadah = Ibadah::all();
        return response()->json([
            'success'   => true,
            'message'   => 'success',
            'ibadah'    => $ibadah
        ]);
    }

    public function dikerjakan($id, $tanggal)
    {
        $ibadah = DB::table('ibadahku')
                        ->where('id_user', '=', $id)
                        ->where('tanggal', '=', $tanggal)
                        ->orderBy('id_ibadah', 'ASC')
                        ->get();
        return response()->json([
            'success'   => true,
            'message'   => 'success',
            'ibadah'    => $ibadah
        ]);
    }

    public function statusIbadah(Request $request)
    {
        if( !$request->status ){
            $ibadah = DB::table('ibadahku')
                        ->where('id_user', '=', $request->id_user)
                        ->where('id_ibadah', '=', $request->id_ibadah)
                        ->where('tanggal', '=', $request->tanggal);
            if( $ibadah ){
                if( $ibadah->delete() ){
                    return response()->json([
                        'success'   => true,
                        'message'   => 'success'
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
                    'message'   => 'ibadah not found'
                ]);
            }
        } else {
            $ibadah = DB::table('ibadahku')
                        ->insert([
                                'id_ibadah' => $request->id_ibadah,
                                'id_user'   => $request->id_user,
                                'tanggal'   => $request->tanggal,
                                'waktu'     => $request->waktu
                            ]);
            if( $ibadah ){
                return response()->json([
                    'success'   => true,
                    'message'   => 'success',
                    'ibadah'    => $ibadah
                ]);
            } else {
                return response()->json([
                    'success'   => false,
                    'message'   => 'failed'
                ]);
            }
        }
    }
}
