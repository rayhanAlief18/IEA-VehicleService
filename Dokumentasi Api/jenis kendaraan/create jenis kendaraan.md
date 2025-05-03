Request create jenis kendaraan:

Menambahkan data jenis kendaraan baru ke dalam sistem.

📍 Endpoint
POST /api/jenis-kendaraan

📥 Request Body
{
  "jenis_kendaraan": "Motor"
}


✅ Response Sukses (201 Created)
{
	"message": "Berhasil menambahkan data kendaraan",
	"data": {
		"jenis_kendaraan": "truk",
		"updated_at": "2025-05-03T03:34:52.000000Z",
		"created_at": "2025-05-03T03:34:52.000000Z",
		"id": 3
	}
}

❌ Response Gagal Validasi (422 Unprocessable Entity)
{
  "errors": {
    "jenis_kendaraan": [
      "Jenis kendaraan sudah ada dalam database."
    ]
  }
}


❌ Response Gagal Server (500 Internal Server Error)
{
  "message": "Gagal menambahkan data kendaraan",
  "error": "Exception message here"
}

