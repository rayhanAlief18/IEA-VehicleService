Request get vehicle (kendaraan) by Id.

Menampilkan data kendaraan berdasarkan ID tertentu.

📍 Endpoint
GET /api/getVehicle/{id}

📌 Parameter
| Nama Parameter | Tipe Data | Lokasi | Deskripsi                      |
| -------------- | --------- | ------ | ------------------------------ |
| `id`           | integer   | URL    | ID kendaraan yang ingin dicari |

✅ Request Example
GET http://localhost:8002/api/getVehicle/5

✅ Response Sukses (201 Created)
{
	"message": "Berhasil menampilkan data kendaraan, berdasarkan ID",
	"data": {
		"id": 2,
		"id_jenis_kendaraan": 1,
		"merk": "N-Max",
		"ukuran": "besar",
		"created_at": "2025-05-03T03:35:38.000000Z",
		"updated_at": "2025-05-03T03:35:38.000000Z"
	}
}

❌ Response Gagal - Kendaraan Tidak Ditemukan (404)
{
  "message": "Kendaraan dengan ID tersebut tidak ditemukan."
}


❌ Response Error (500 Internal Server Error)
{
  "message": "Gagal menampilkan data kendaraan, berdsarkan ID",
  "error": "Exception message here"
}

 