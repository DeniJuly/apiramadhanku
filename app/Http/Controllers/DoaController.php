<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doa;

class DoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getAll()
    {
        $doa = Doa::all();
        return response()->json([
            'success'   => true,
            'message'   => 'success',
            'doa'       => $doa
        ]);
    }

    public function getDetail($id)
    {
        $doa = Doa::find($id);
        if($doa){
            return response()->json([
                'success'   => true,
                'message'   => 'success',
                'doa'       => $doa
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'doa not found'
            ], 404);
        }
    }

    public function getSomeDoa($jml = 0)
    {
        $doa = Doa::limit($jml)
                    ->orderBy('id', 'DESC')
                    ->get();
        return response()->json([
            'success'   => true,
            'message'   => 'success',
            'doa'       => $doa
        ]);
    }
}
