# SatuSehat FHIR Management System - Update Summary

## Fitur Baru

### 1. Halaman Utama (Homepage)
- **URL**: `http://satusehat.test/` atau `http://satusehat.test/index.php/home`
- **File**: `application/views/home.php`
- **Deskripsi**: Halaman utama yang menampilkan dua pilihan resource FHIR:
  - Organization Management
  - Patient Management

### 2. Patient Management Module
Modul lengkap untuk mengelola data pasien sesuai standar FHIR:

#### Controller: `application/controllers/Patient_form.php`
- `index()` - Menampilkan menu Patient
- `create()` - Membuat pasien baru (GET/POST)
- `get_by_id()` - Cari pasien berdasarkan ID (GET/POST)
- `get_by_name()` - Cari pasien berdasarkan nama (GET/POST)
- `update()` - Update data pasien (GET/POST)

#### Model: `application/models/Patient_model.php`
- `createPatient()` - Buat patient resource
- `getPatientById()` - Ambil patient berdasarkan ID
- `getPatientByName()` - Cari patient berdasarkan nama
- `updatePatient()` - Update patient data

#### Views: `application/views/patient/`
- `menu.php` - Menu Patient management
- `create.php` - Form registrasi pasien baru
- `get_by_id.php` - Form cari pasien by ID
- `get_by_name.php` - Form cari pasien by nama
- `update.php` - Form update data pasien
- `result.php` - Halaman hasil API response

## Route Configuration

```php
// Home Route
$route['^/$'] = 'home/index';

// Organization Form Routes
$route['organization_form'] = 'organization_form/index';
$route['organization_form/(:any)'] = 'organization_form/$1';

// Patient Form Routes
$route['patient_form'] = 'patient_form/index';
$route['patient_form/(:any)'] = 'patient_form/$1';
```

## Alur Navigasi

1. **Halaman Utama** (Home)
   - URL: `/` atau `/index.php/home`
   - Menampilkan 2 card pilihan: Organization dan Patient

2. **Organization**
   - Masuk ke menu Organization Management
   - Pilih operasi (Create, Get by ID, Get by Name, Get by PartOf, Update)
   - Submit form → Lihat hasil API response
   - Bisa kembali ke menu utama dari halaman Organization menu

3. **Patient**
   - Masuk ke menu Patient Management
   - Pilih operasi (Create, Get by ID, Get by Name, Update)
   - Submit form → Lihat hasil API response
   - Bisa kembali ke menu utama dari halaman Patient menu

## Fitur Patient Management

### Create Patient
- Input: Given Name, Family Name, Birth Date, Gender, Telecom (optional)
- Validasi: Required fields, min length, valid date format

### Get Patient by ID
- Input: Patient ID
- Output: Patient resource data dalam format JSON

### Get Patient by Name
- Input: Patient Name
- Output: Bundle dengan entry pasien yang ditemukan

### Update Patient
- Input: Patient ID, Given Name, Family Name, Birth Date, Gender, Telecom (optional)
- Output: Updated patient resource

## Styling & UI
- Modern gradient design (purple/blue)
- Responsive grid layout
- Mobile-friendly design
- Dark mode color scheme untuk kontras optimal
- Smooth hover effects dan animations

## Validation Rules

### Patient Create/Update
- `given_name`: Required, min 2 characters
- `family_name`: Required, min 2 characters
- `birth_date`: Required, valid date (Y-m-d format)
- `gender`: Required, enum: male/female/other/unknown
- `telecom_system`: Optional, enum: phone/email/fax/sms
- `telecom_value`: Optional

## File Changes Summary
- ✅ Buat `Home.php` controller
- ✅ Buat `Patient_form.php` controller
- ✅ Buat `Patient_model.php` model
- ✅ Buat `home.php` view
- ✅ Buat 6 views di `patient/` directory
- ✅ Update `routes.php` untuk default controller dan patient routes
- ✅ Update `organization/menu.php` untuk link ke home page

## Testing

Akses aplikasi di browser:
1. Halaman Utama: `http://satusehat.test/`
2. Organization: `http://satusehat.test/index.php/organization_form`
3. Patient: `http://satusehat.test/index.php/patient_form`

Semua form sudah menggunakan absolute paths untuk action attribute, tidak ada lagi masalah URL duplication.
