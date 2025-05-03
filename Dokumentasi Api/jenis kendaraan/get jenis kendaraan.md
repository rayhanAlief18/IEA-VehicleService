Request get jenis kendaraan:

Mengambil seluruh data jenis kendaraan dari sistem.


📍 Endpoint
GET /api/jenis-kendaraan

✅ Response Sukses (201 Created)
{
	"message": "Berhasil menampilkan data jenis kendaraan",
	"data": [
		{
			"id": 1,
			"jenis_kendaraan": "motor",
			"created_at": "2025-05-03T03:34:40.000000Z",
			"updated_at": "2025-05-03T03:34:40.000000Z"
		},
		{
			"id": 2,
			"jenis_kendaraan": "mobil",
			"created_at": "2025-05-03T03:34:46.000000Z",
			"updated_at": "2025-05-03T03:34:46.000000Z"
		},
		{
			"id": 3,
			"jenis_kendaraan": "truk",
			"created_at": "2025-05-03T03:34:52.000000Z",
			"updated_at": "2025-05-03T03:34:52.000000Z"
		}
	]
}

❌ Response Gagal (500 Internal Server Error)
{
  "message": "Gagal menampilkan data jenis kendaraan !",
  "error": "Exception message here"
}
	