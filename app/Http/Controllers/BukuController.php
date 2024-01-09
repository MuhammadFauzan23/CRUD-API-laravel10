<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = BukuModel::all();

        return response()->json([
            'title' => 'Halaman Beranda',
            'data_buku' => $data,
            'status' => true,
            'message' => 'Data ditemukan',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataBuku = new BukuModel();

        $rules = [
            'judul' => 'required',
            'pengarang'  => 'required',
            'tanggal_publikasi' => 'required|date',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal ditambahkan',
                'data' => $validator->errors(),
            ]);
        }

        $dataBuku->judul = $request->judul;
        $dataBuku->pengarang = $request->pengarang;
        $dataBuku->tanggal_publikasi = $request->tanggal_publikasi;
        $dataBuku->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BukuModel::find($id);
        if ($data) {
            return response()->json([
                'title' => 'Halaman Beranda ',
                'data_buku' => $data,
                'status' => true,
                'message' => 'Data ditemukan'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataBuku = BukuModel::find($id);
        if (!$dataBuku) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditambahkan'
            ], 404);
        }
        $rules = [
            'judul' => 'required',
            'pengarang'  => 'required',
            'tanggal_publikasi' => 'required|date',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal diubah',
                'data' => $validator->errors(),
            ]);
        }

        $dataBuku->judul = $request->judul;
        $dataBuku->pengarang = $request->pengarang;
        $dataBuku->tanggal_publikasi = $request->tanggal_publikasi;
        $dataBuku->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataBuku = BukuModel::find($id);
        if (!$dataBuku) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditambahkan'
            ], 404);
        }

        $dataBuku->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}
