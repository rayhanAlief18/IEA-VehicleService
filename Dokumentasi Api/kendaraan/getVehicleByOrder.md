Request get vehicle by order:

Mengambil data kendaraan beserta riwayat order berdasarkan ID kendaraan.

📍 Endpoint

GET /api/vehicle-with-order/{id}

📌 URL Parameter

| Nama Parameter | Tipe Data | Deskripsi                            |
| -------------- | --------- | ------------------------------------ |
| `id`           | integer   | ID dari kendaraan yang ingin diambil |

Contoh:
GET /api/vehicle-with-order/4

✅ Response Sukses (201 Created)

{
  "message": "Berhasil ambil data order by kendaraan",
  "vehicle": {
    "id": 4,
    "id_jenis_kendaraan": 2,
    "merk": "Honda Vario",
    "ukuran": "Sedang",
    "created_at": "2025-05-01T09:00:00.000000Z",
    "updated_at": "2025-05-01T09:00:00.000000Z"
  },
  "data": [
    {
      "id": 12,
      "id_user": 3,
      "id_kendaraan": 4,
      "pelayanan": "Ganti Oli",
      "biaya": 50000,
      "durasi_pengerjaan": "30 menit",
      "no_antrian": "A-12",
      "created_at": "2025-05-03T10:00:00.000000Z",
      "updated_at": "2025-05-03T10:00:00.000000Z"
    }
  ]
}

❌ Response Gagal - Kendaraan Tidak Ditemukan (404)
{
  "message": "Kendaraan tidak ditemukan"
}


❌Response Gagal - Layanan Order Tidak Tersedia
{
  "message": "Berhasil ambil data order by kendaraan",
  "vehicle": {
    "...": "..."
  },
  "data": [],
  "error": "Mohon maaf, layanan order sedang tidak tersedia. Silakan coba lagi nanti."
}


❌ Response Gagal - Server Error (500 Internal Server Error)
{
  "message": "Gagal mengambil data history order per kendaraan",
  "error": "Exception message here"
}



