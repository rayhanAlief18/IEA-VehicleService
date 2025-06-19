<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\vehicle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class vehicleController extends Controller
{
    public function index(){
        try{
            $data = vehicle::all();
            return response()->json([
                'message'=>'Berhasil menampilkan data kendaraan',
                'data'=>$data,
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'Gagal menampilkan data kendaraan !',
                'error'=>$e->getMessage(),
            ],500);
        };
    }

    public function getVehicleById($id){
        try{
            $data = vehicle::find($id);
            if (!$data) {
                return response()->json([
                    'message' => 'Kendaraan dengan ID tersebut tidak ditemukan.',
                ], 404);
            }
            return response()->json([
                'message'=>'Berhasil menampilkan data kendaraan, berdasarkan ID',
                'data'=>$data,
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'Gagal menampilkan data kendaraan, berdsarkan ID',
                'error'=>$e->getMessage(),
            ],500);
        };
    }

    public function createVehicle(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'id_jenis_kendaraan' => 'required|exists:jenis_kendaraans,id',
                'merk' => 'required|string|max:255',
                'ukuran' => 'required|string|max:100',
            ], [
                'id_jenis_kendaraan.required' => 'Jenis kendaraan harus dipilih.',
                'id_jenis_kendaraan.exists' => 'Jenis kendaraan yang dipilih tidak valid.',
                'merk.required' => 'Merk kendaraan wajib diisi.',
                'merk.string' => 'Merk kendaraan harus berupa teks.',
                'merk.max' => 'Merk kendaraan tidak boleh lebih dari 255 karakter.',
                'ukuran.required' => 'Ukuran kendaraan wajib diisi.',
                'ukuran.string' => 'Ukuran kendaraan harus berupa teks.',
                'ukuran.max' => 'Ukuran kendaraan tidak boleh lebih dari 100 karakter.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $data = vehicle::create([
                'id_jenis_kendaraan'=>$request->id_jenis_kendaraan,
                'merk'=> $request->merk,
                'ukuran'=>$request->ukuran,
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

    public function getVehicleByOrder($id){
        try{
            $vehicle = vehicle::find($id);
            if(!$vehicle){
                return response()->json([
                    'message'=>'Kendaraan tidak ditemukan'
                ],404);
            }

            $orders = [];
            $error   = null;

            try{
                // Batasi timeout agar tidak nunggu terlalu lama
                $response = Http::timeout(2)->get("http://nginx-order/api/order/by-vehicle/{$id}");

                if ($response->successful()) {
                    $orders = $response->json('data'); // array order
                }else{
                    $error = "Maaf sistem order belum aktif";
                }

            }catch(\Throwable $e){
                
                $orders = [];
                // Kalau koneksi gagal atau timeout
                $error = 'Mohon maaf, layanan order sedang tidak tersedia. Silakan coba lagi nanti.';
            }
            
        // Ambil data order
        // $data = $response->json();
        // $orders = $data['data'];  // Ambil bagian data yang berisi order

        return response()->json([
            'message' => 'Berhasil ambil data order by kendaraan',
            'vehicle' => $vehicle,
            'data' => $orders,
        ], 201);

        // return Inertia::render('Karyawan/OrderDetail', [
        //     'data' => $orders,
        //     'user_id' => intval($id),
        //     'error' => $error
        // ]);

        }catch(Exception $e){
            return response()->json([
                'message' => 'Gagal mengambil data history order per kendaraan',
                'error' => $e->getMessage(),
            ],500);
        }
    }

    
}
