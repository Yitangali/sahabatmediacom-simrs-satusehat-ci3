# 🏥 SatuSehat FHIR - Organization Management System

Sistem interaktif untuk mengelola data Organization menggunakan library Satusehat/FHIR/Resource/Organization dengan desain MVC (Model-View-Controller) pada CodeIgniter.

## 📋 Fitur

### 1. **Create Organization**
   - Membuat data organisasi baru
   - Form input untuk nama, tipe, kontak, dan alamat
   - Validasi form di sisi server
   - Menampilkan response JSON dari API SatuSehat

### 2. **Get Organization by ID**
   - Mencari organisasi berdasarkan UUID
   - Menampilkan detail lengkap organisasi

### 3. **Get Organization by Name**
   - Mencari organisasi berdasarkan nama
   - Mendukung pencarian partial

### 4. **Get Organization by Parent Organization**
   - Mencari sub-organisasi dari organisasi induk
   - Menggunakan query parameter `partOf`

### 5. **Update Organization**
   - Memperbarui data organisasi yang sudah ada
   - Form input lengkap dengan validasi
   - Menampilkan response dari API

## 🗂️ Struktur File

```
application/
├── controllers/
│   └── Organization_form.php          # Controller utama
├── models/
│   └── Organization_model.php         # Model dengan logika bisnis
└── views/
    └── organization/
        ├── menu.php                   # Halaman menu utama
        ├── create.php                 # Form create organization
        ├── get_by_id.php              # Form search by ID
        ├── get_by_name.php            # Form search by name
        ├── get_by_partof.php          # Form search by parent org
        ├── update.php                 # Form update organization
        └── result.php                 # Halaman hasil response
```

## 🚀 Cara Mengakses

### Melalui Virtual Host Laragon
Karena Anda menggunakan Laragon dengan auto-create virtual host yang aktif, akses aplikasi melalui:

```
http://satusehat.test/organization_form/
```

### Route Utama

| URL | Deskripsi |
|-----|-----------|
| `/organization_form/` | Menu utama |
| `/organization_form/create` | Form create organization |
| `/organization_form/get_by_id` | Form search by ID |
| `/organization_form/get_by_name` | Form search by name |
| `/organization_form/get_by_partof` | Form search by parent org |
| `/organization_form/update` | Form update organization |

## 📝 Contoh Penggunaan

### 1. Create Organization
1. Klik tombol **"Create Organization"** di menu utama
2. Isi form dengan data:
   - **Organization Name**: RS Mitra Sehat
   - **Organization Type**: prov (Provider)
   - **Telecom System**: phone (optional)
   - **Telecom Value**: +62-21-123456 (optional)
   - **Address Line**: Jl. Merdeka No. 123 (optional)
   - **City**: Jakarta (optional)
   - **Postal Code**: 12345 (optional)
3. Klik tombol **"Buat Organization"**
4. Lihat response JSON dari server SatuSehat

### 2. Search Organization by ID
1. Klik tombol **"Get by ID"**
2. Masukkan Organization ID (format UUID)
3. Klik tombol **"Cari Organization"**
4. Response akan ditampilkan dengan detail lengkap

### 3. Search Organization by Name
1. Klik tombol **"Get by Name"**
2. Masukkan nama organisasi (atau bagian dari nama)
3. Klik tombol **"Cari Organization"**
4. Hasil pencarian akan ditampilkan

### 4. Search by Parent Organization
1. Klik tombol **"Get by Parent Organization"**
2. Masukkan ID organisasi induk
3. Klik tombol **"Cari Organization"**
4. Sub-organisasi akan ditampilkan

### 5. Update Organization
1. Klik tombol **"Update Organization"**
2. Isi Organization ID yang akan diupdate
3. Modifikasi data yang ingin diubah
4. Klik tombol **"Update Organization"**
5. Response update akan ditampilkan

## 🏗️ Arsitektur MVC

### Model (Organization_model.php)
- Berisi logika bisnis dan interaksi dengan library Organization
- Method:
  - `createOrganization()` - Membuat organisasi baru
  - `getOrganizationById()` - Mendapatkan organisasi by ID
  - `getOrganizationByName()` - Mencari organisasi by name
  - `getOrganizationByPartOf()` - Mencari sub-organisasi
  - `updateOrganization()` - Mengupdate organisasi

### Controller (Organization_form.php)
- Menangani request HTTP dan logika flow
- Method:
  - `index()` - Menampilkan menu utama
  - `create()` - Proses create organization
  - `get_by_id()` - Proses search by ID
  - `get_by_name()` - Proses search by name
  - `get_by_partof()` - Proses search by partOf
  - `update()` - Proses update organization

### Views
- **menu.php** - Dashboard dengan card menu
- **create.php** - Form create organization
- **get_by_id.php** - Form search by ID
- **get_by_name.php** - Form search by name
- **get_by_partof.php** - Form search by parent org
- **update.php** - Form update organization
- **result.php** - Halaman hasil response

## 🎨 Desain UI

- **Responsive Design** - Tampilan optimal di desktop dan mobile
- **Modern Gradient** - Menggunakan gradient purple-blue untuk header
- **Card Layout** - Menu dalam bentuk card yang interaktif
- **Form Validation** - Validasi form di sisi client dan server
- **JSON Response Viewer** - Menampilkan response dalam format yang rapi

## 🔧 Konfigurasi

Pastikan konfigurasi CodeIgniter sudah sesuai:

### config/config.php
```php
$config['base_url'] = 'http://satusehat.test/';
```

### config/routes.php
```php
$route['organization_form'] = 'organization_form';
$route['organization_form/(:any)'] = 'organization_form/$1';
```

## 📚 Library Dependency

Aplikasi ini menggunakan:
- **CodeIgniter** - Framework PHP
- **Satusehat/FHIR/Resource/Organization** - Library FHIR Organization
- **Satusehat/Core/SatusehatClient** - HTTP Client
- **Form Validation** - Validasi form CodeIgniter

## ⚠️ Catatan Penting

1. **Authentication**: Pastikan aplikasi sudah terautentikasi dengan API SatuSehat
2. **Temporary Files**: Model membuat file JSON temporary untuk payload, pastikan sistem temp directory dapat ditulis
3. **Error Handling**: Semua exception ditampilkan dengan message yang jelas
4. **Data Validation**: Form input divalidasi sebelum dikirim ke API

## 🐛 Troubleshooting

### Error: Organization ID tidak boleh kosong
- Pastikan mengisi Organization ID dengan benar (format UUID)

### Error: Connection Refused
- Pastikan server SatuSehat dapat diakses
- Cek konfigurasi authentication token

### Error: File Permission Denied
- Pastikan directory temp dapat ditulis oleh PHP
- Cek permission folder `/tmp/` atau `%TEMP%`

## 📞 Support

Untuk pertanyaan lebih lanjut mengenai library Satusehat/FHIR, silakan cek:
- [Satusehat FHIR Documentation](https://satusehat.kemkes.go.id/platform/)
- [HL7 FHIR Standard](https://www.hl7.org/fhir/)

---

**Created**: 2026
**Framework**: CodeIgniter
**Language**: PHP
**License**: MIT
