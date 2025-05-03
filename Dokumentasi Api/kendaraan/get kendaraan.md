Request get Vehicle (kendaraan)

Menampilkan seluruh data kendaraan yang tersedia.


📍 Endpoint
GET /api/vehicle

✅ Request
Method: GET
URL Contoh: http://localhost:8002/api/vehicle

✅ Response Sukses (201 Created)
{
	"message": "Berhasil menampilkan data kendaraan",
	"data": [
		{
			"id": 1,
			"id_jenis_kendaraan": 3,
			"merk": "Carry Pick Up",
			"ukuran": "kecil",
			"created_at": "2025-05-03T03:35:13.000000Z",
			"updated_at": "2025-05-03T03:35:13.000000Z"
		},
		{
			"id": 2,
			"id_jenis_kendaraan": 1,
			"merk": "N-Max",
			"ukuran": "besar",
			"created_at": "2025-05-03T03:35:38.000000Z",
			"updated_at": "2025-05-03T03:35:38.000000Z"
		},
		{
			"id": 3,
			"id_jenis_kendaraan": 2,
			"merk": "Ayla",
			"ukuran": "kecil",
			"created_at": "2025-05-03T03:36:17.000000Z",
			"updated_at": "2025-05-03T03:36:17.000000Z"
		},
		{
			"id": 4,
			"id_jenis_kendaraan": 1,
			"merk": "Beat",
			"ukuran": "kecil",
			"created_at": "2025-05-03T03:36:55.000000Z",
			"updated_at": "2025-05-03T03:36:55.000000Z"
		},
		{
			"id": 5,
			"id_jenis_kendaraan": 3,
			"merk": "Fuso",
			"ukuran": "Besar",
			"created_at": "2025-05-03T03:37:22.000000Z",
			"updated_at": "2025-05-03T03:37:22.000000Z"
		}
	]
}

❌ Response Error (500 Internal Server Error)
{
  "message": "Gagal menampilkan data kendaraan !",
  "error": "Exception message here"
}
