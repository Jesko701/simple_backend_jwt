<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswasController extends Controller
{
    /**
     * Create a new controller instance.
     * @param int $id
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAll()
    {
        $mahasiswa = Mahasiswa::all();
        if (!$mahasiswa) {
            return response()->json([
                'status' => false,
                'message' => 'gagal mengambil data'
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'berhasil mengambil data',
            'data' => $mahasiswa
        ]);
    }

    public function deleteByNim(Request $request) {
        $mahasiswa = Mahasiswa::find($request->nim);
        $mahasiswa->delete();
        return response()->json([
            'status' => true,
            'message' => 'data berhasil dihapus'
        ]);
    }

    public function getWithToken(Request $request) {
        $mahasiswa = Mahasiswa::find($request->user->NIM);
        return response()->json([
            'status' => true,
            'message' => 'berhasil mengambil data',
            'data' => $mahasiswa
        ]);
    }
}
