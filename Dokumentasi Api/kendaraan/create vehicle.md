Requesy Create Vehicle (kendaraan):

Menambahkan data kendaraan baru ke sistem.

📍 Endpoint
POST /api/createVehicle


📥 Request Body

| Nama Field           | Tipe Data | Validasi                               | Deskripsi                          |
| -------------------- | --------- | -------------------------------------- | ---------------------------------- |
| `id_jenis_kendaraan` | integer   | required, exists\:jenis\_kendaraans,id | ID dari jenis kendaraan yang valid |
| `merk`               | string    | required, max:255                      | Merk dari kendaraan                |
| `ukuran`             | string    | required, max:100                      | Ukuran dari kendaraan              |

Contoh Request:
{
  "id_jenis_kendaraan": 1,
  "merk": "Yamaha NMAX",
  "ukuran": "Sedang"
}

✅ Response Sukses (201 Created)
{
  "message": "Berhasil menambahkan data kendaraan",
  "data": {
    "id": 10,
    "id_jenis_kendaraan": 1,
    "merk": "Yamaha NMAX",
    "ukuran": "Sedang",
    "created_at": "2025-05-03T13:00:00.000000Z",
    "updated_at": "2025-05-03T13:00:00.000000Z"
  }
}

❌ Response Gagal - Validasi (422 Unprocessable Entity)
{
  "errors": {
    "merk": [
      "Merk kendaraan wajib diisi."
    ],
    "ukuran": [
      "Ukuran kendaraan wajib diisi."
    ]
  }
}

❌ Response Gagal - Server Error (500 Internal Server Error)

{
  "message": "Gagal menambahkan data kendaraan",
  "error": "Exception message here"
}
