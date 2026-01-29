# 🚀 Quick Start Guide

Panduan cepat untuk memulai menggunakan SatuSehat Organization Form.

---

## ⚡ 5 Menit Setup

### Step 1: Verifikasi Virtual Host
Buka browser dan akses:
```
http://satusehat.test/organization_form/
```

Jika halaman menu muncul dengan 5 kartu pilihan, setup sudah berhasil! ✅

### Step 2: Menu Utama
Di halaman menu, Anda akan melihat 5 pilihan:
1. ➕ **Create Organization** - Buat organisasi baru
2. 🔍 **Get by ID** - Cari organisasi berdasarkan ID
3. 📝 **Get by Name** - Cari organisasi berdasarkan nama
4. 🏢 **Get by Parent Organization** - Cari sub-organisasi
5. ✏️ **Update Organization** - Perbarui data organisasi

---

## 📝 Contoh Cepat: Create Organization

### Step 1: Klik "Create Organization"
Anda akan dibawa ke form create.

### Step 2: Isi Form
```
Organization Name: RS Contoh
Organization Type: prov (Provider)
Telecom System: phone
Telecom Value: +62-21-1234567
Address Line: Jl. Contoh No. 1
City: Jakarta
Postal Code: 12345
```

### Step 3: Klik "Buat Organization"
Tunggu processing...

### Step 4: Lihat Response
JSON response dari API SatuSehat akan ditampilkan dalam format yang rapi.

---

## 🔍 Contoh Cepat: Get Organization by ID

### Step 1: Klik "Get by ID"

### Step 2: Paste Organization ID
Gunakan ID dari hasil Create Organization sebelumnya, atau ID existing organization:
```
79add4a3-d95d-41a5-9a77-b7d8b1f7e4e8
```

### Step 3: Klik "Cari Organization"

### Step 4: Lihat Response
Detail lengkap organization akan ditampilkan.

---

## 📊 Form Field Guide

### Required Fields (Wajib Diisi)

| Field | Type | Example |
|-------|------|---------|
| Organization Name | Text | RS Mitra Sehat |
| Organization Type | Dropdown | prov, dept, team, govt, edu, other |
| Organization ID (Get/Update) | Text | UUID format |

### Optional Fields (Opsional)

| Field | Type | Example |
|-------|------|---------|
| Telecom System | Dropdown | phone, email, fax, url |
| Telecom Value | Text | +62-21-1234567 atau email@example.com |
| Address Line | Text | Jl. Sudirman No. 1 |
| City | Text | Jakarta |
| Postal Code | Text | 12190 |

---

## ✅ Organization Type Reference

| Code | Meaning |
|------|---------|
| `prov` | Provider / Rumah Sakit |
| `dept` | Department / Departemen |
| `team` | Team / Tim |
| `govt` | Government / Pemerintah |
| `edu` | Education / Pendidikan |
| `other` | Other / Lainnya |

---

## 📱 Telecom System Reference

| System | Value Example |
|--------|---------------|
| `phone` | +62-21-5555555 |
| `email` | info@example.com |
| `fax` | +62-21-5555556 |
| `url` | https://example.com |
| `sms` | +62-81234567890 |
| `pager` | pager number |
| `other` | custom value |

---

## 🎯 Common Tasks

### Task 1: Buat Organisasi Baru
1. Menu → Create Organization
2. Isi form dengan data organisasi
3. Klik "Buat Organization"
4. Catat Organization ID dari response

### Task 2: Cari Organisasi
1. Menu → Get by ID (atau Get by Name)
2. Isi search criteria
3. Klik "Cari Organization"
4. Lihat detail organisasi

### Task 3: Update Organisasi
1. Menu → Update Organization
2. Masukkan Organization ID yang akan diupdate
3. Ubah data yang ingin diperbarui
4. Klik "Update Organization"
5. Verifikasi response

---

## 🐛 Troubleshooting Cepat

| Problem | Solution |
|---------|----------|
| Page not found (404) | Cek URL: `http://satusehat.test/organization_form/` |
| Form error validation | Pastikan semua required field diisi |
| API error response | Cek konfigurasi authentication di SatusehatClient |
| Empty search result | Cek apakah organisasi exist di API server |

---

## 📸 UI Navigation

### Menu Page
```
┌─────────────────────────────────────┐
│     SatuSehat FHIR Organization     │
│     Management System               │
├─────────────────────────────────────┤
│  ➕ Create   │  🔍 Get by ID        │
│  📝 Get Name │  🏢 Get Parent       │
│             ✏️ Update                │
└─────────────────────────────────────┘
```

### Form Page
```
┌─────────────────────────────────────┐
│     Form Title                      │
├─────────────────────────────────────┤
│  [Input Fields]                     │
│  [Validation Messages if any]       │
│                                     │
│  [Tombol Submit] [Tombol Kembali]   │
└─────────────────────────────────────┘
```

### Result Page
```
┌─────────────────────────────────────┐
│     ✅ Success / ❌ Error           │
├─────────────────────────────────────┤
│  [Alert Box]                        │
│  [Request Info]                     │
│  [JSON Response Viewer]             │
│                                     │
│  [Tombol Menu] [Tombol Kembali]     │
└─────────────────────────────────────┘
```

---

## 💡 Tips & Tricks

### Tip 1: Save Organization ID
Ketika create organization berhasil, save ID dari response untuk testing berikutnya.

### Tip 2: Copy-Paste Response
JSON response dapat di-copy langsung dari halaman result untuk dokumentasi.

### Tip 3: Test All Operations
Coba semua operasi (Create, Read, Update) untuk memahami flow sistem.

### Tip 4: Check API Docs
Buka `API_DOCUMENTATION.md` untuk detail technical tentang setiap endpoint.

---

## 📚 Documentation Map

| Document | Purpose |
|----------|---------|
| **PROJECT_SUMMARY.md** | Overview proyek lengkap |
| **ORGANIZATION_FORM_README.md** | User guide lengkap |
| **SETUP_GUIDE.md** | Setup dan testing guide |
| **API_DOCUMENTATION.md** | Technical API details |
| **QUICK_START_GUIDE.md** | Panduan cepat ini |

---

## 🔗 Important Links

- **Application URL**: http://satusehat.test/organization_form/
- **Virtual Host**: satusehat.test
- **Framework**: CodeIgniter 3
- **FHIR Standard**: https://www.hl7.org/fhir/

---

## ✨ Next Steps

1. ✅ Akses aplikasi di browser
2. ✅ Coba Create Organization
3. ✅ Coba Get Organization
4. ✅ Coba Update Organization
5. ✅ Read full documentation

---

## 📞 Need Help?

1. **Setup issues?** → Check `SETUP_GUIDE.md`
2. **How to use?** → Check `ORGANIZATION_FORM_README.md`
3. **API details?** → Check `API_DOCUMENTATION.md`
4. **Project overview?** → Check `PROJECT_SUMMARY.md`

---

**Status**: Ready to Use ✅

Selamat menggunakan SatuSehat Organization Form! 🎉
