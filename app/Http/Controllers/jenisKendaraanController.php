<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKendaraan;
use Illuminate\Support\Facades\Validator;
class jenisKendaraanController extends Controller
{
    public function index(){
        try{
            $data = JenisKendaraan::all();
            return response()->json( [
                'message'=>'Berhasil menampilkan data jenis kendaraan',
                'data'=>$data,
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'Gagal menampilkan data jenis kendaraan !',
                'error'=>$e->getMessage(),
            ],500);
        };
    }

    public function createJenisKendaraan(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'jenis_kendaraan' => 'required|string|max:100|unique:jenis_kendaraans,jenis_kendaraan',
            ], [
                'jenis_kendaraan.required' => 'Jenis kendaraan wajib diisi.',
                'jenis_kendaraan.string' => 'Jenis kendaraan harus berupa teks.',
                'jenis_kendaraan.max' => 'Jenis kendaraan tidak boleh lebih dari 100 karakter.',
                'jenis_kendaraan.unique' => 'Jenis kendaraan sudah ada dalam database.',
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $data = JenisKendaraan::create([
                'jenis_kendaraan'=> $request->jenis_kendaraan,
            ]);

            return response()->json([
                'message'=>'Berhasil menambahkan data kendaraan',
                'data'=>$data,
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'Gagal menambahkan data kendaraan',
                'error'=>$e->getMessage(),
            ]);
        }
    }
}
