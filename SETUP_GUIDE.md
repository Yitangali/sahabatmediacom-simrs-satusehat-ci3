# Setup Guide - SatuSehat Organization Form

## Langkah-Langkah Setup

### 1. Verifikasi File yang Sudah Dibuat

Pastikan semua file berikut sudah ada di project:

```
✅ application/controllers/Organization_form.php
✅ application/models/Organization_model.php
✅ application/views/organization/menu.php
✅ application/views/organization/create.php
✅ application/views/organization/get_by_id.php
✅ application/views/organization/get_by_name.php
✅ application/views/organization/get_by_partof.php
✅ application/views/organization/update.php
✅ application/views/organization/result.php
✅ application/config/routes.php (sudah di-update)
```

### 2. Verifikasi Konfigurasi CodeIgniter

Pastikan file `application/config/config.php` sudah dikonfigurasi dengan benar:

```php
// Base URL untuk satusehat.test
$config['base_url'] = 'http://satusehat.test/';

// Enable error reporting (untuk development)
$config['log_threshold'] = 2;
```

### 3. Verifikasi Helper dan Library

Pastikan yang berikut sudah tersedia:

**Helper yang diperlukan:**
- `application/helpers/satusehat_helper.php` ✅ (sudah ada)

**Library yang diperlukan:**
- `application/libraries/Satusehat/FHIR/Resource/Organization.php` ✅ (sudah ada)
- `application/libraries/Satusehat/Core/SatusehatClient.php` ✅ (diperlukan)

### 4. Test Akses Virtual Host

Buka browser dan akses:
```
http://satusehat.test/organization_form/
```

Jika berhasil, Anda akan melihat halaman menu utama dengan 5 pilihan operasi.

## 🧪 Testing

### Test Case 1: Create Organization

1. Klik **"Create Organization"** dari menu
2. Isi form dengan data test:
   ```
   Organization Name: RS Mitra Sehat Test
   Organization Type: prov
   Telecom System: phone
   Telecom Value: +62-21-5555555
   Address Line: Jl. Sudirman No. 1
   City: Jakarta
   Postal Code: 12190
   ```
3. Klik **"Buat Organization"**
4. Tunggu response dari API SatuSehat

### Test Case 2: Get by ID

1. Copy Organization ID dari hasil Create Organization
2. Klik **"Get by ID"** dari menu
3. Paste Organization ID ke form
4. Klik **"Cari Organization"**
5. Verifikasi data yang ditampilkan

### Test Case 3: Get by Name

1. Klik **"Get by Name"** dari menu
2. Masukkan nama organization: `RS Mitra Sehat`
3. Klik **"Cari Organization"**
4. Lihat hasil pencarian

### Test Case 4: Update Organization

1. Klik **"Update Organization"** dari menu
2. Masukkan Organization ID yang ingin diupdate
3. Ubah nama atau data lainnya
4. Klik **"Update Organization"**
5. Verifikasi response dari update

## 📊 Struktur JSON Payload

Aplikasi ini membuat payload FHIR Organization dengan struktur:

```json
{
  "resourceType": "Organization",
  "name": "Nama Organisasi",
  "type": [
    {
      "coding": [
        {
          "system": "http://terminology.hl7.org/CodeSystem/organization-type",
          "code": "prov"
        }
      ]
    }
  ],
  "telecom": [
    {
      "system": "phone",
      "value": "+62-21-123456"
    }
  ],
  "address": [
    {
      "line": [
        "Jl. Merdeka No. 123"
      ],
      "city": "Jakarta",
      "postalCode": "12345"
    }
  ]
}
```

## 🔍 Debugging

Jika ada error, cek hal-hal berikut:

### 1. Cek Log File
```
application/logs/log-*.php
```

### 2. Enable CodeIgniter Error Output
Edit `application/config/config.php`:
```php
$config['log_threshold'] = 4; // Debug level
define('ENVIRONMENT', 'development');
```

### 3. Verifikasi Database Temp
Pastikan PHP dapat menulis ke direktori temp untuk menyimpan JSON payload:
```php
// Biasanya di Windows: C:\Windows\Temp atau system temp directory
// Linux: /tmp/
```

### 4. Test Connection ke SatuSehat API
Pastikan:
- Token authentication sudah valid
- API endpoint dapat diakses dari server
- Network firewall tidak memblokir request

## 📝 Catatan Penting

1. **Security**: Untuk production, gunakan HTTPS dan implement proper authentication
2. **Session Management**: Pertimbangkan menambahkan session timeout
3. **Rate Limiting**: API SatuSehat memiliki rate limiting, implementasikan caching jika perlu
4. **Error Handling**: Semua exception sudah di-handle, namun bisa ditambahkan more detailed logging
5. **Form Validation**: Validasi form sudah ada di server-side, bisa ditambahkan client-side untuk better UX

## 🚀 Next Steps

### Fitur Tambahan yang Bisa Diimplementasikan

1. **Bulk Operations**
   - Membuat multiple organizations sekaligus
   - Bulk update untuk data tertentu

2. **Advanced Search**
   - Search dengan multiple criteria
   - Filter by date range, status, dll

3. **Export/Import**
   - Export data ke CSV/Excel
   - Import dari file eksternal

4. **Dashboard Analytics**
   - Total organizations
   - Recent activities
   - Statistics visualization

5. **Audit Log**
   - Log semua operasi yang dilakukan
   - Track changes dan user yang melakukan

6. **Role-Based Access Control**
   - Restrict akses berdasarkan user role
   - Different permissions untuk read/write

## 📞 Troubleshooting Guide

### Problem: "Controller not found"
**Solution**: Pastikan file `Organization_form.php` ada di folder `application/controllers/`

### Problem: "Model not found"
**Solution**: Load model di controller dengan: `$this->load->model('Organization_model');`

### Problem: "View not found"
**Solution**: Pastikan folder `application/views/organization/` sudah ada dan view files sudah lengkap

### Problem: "Library not found"
**Solution**: Pastikan library Organization sudah ada di path yang benar

### Problem: "AJAX requests timeout"
**Solution**: Cek connection ke API SatuSehat, timeout bisa terjadi jika API slow

### Problem: "JSON encoding error"
**Solution**: Pastikan data valid UTF-8, gunakan JSON_UNESCAPED_UNICODE flag

---

Jika semua sudah setup dengan benar, aplikasi siap digunakan!
Akses melalui: **http://satusehat.test/organization_form/**
