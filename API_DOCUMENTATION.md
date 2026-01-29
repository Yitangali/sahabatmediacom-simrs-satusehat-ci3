# API Documentation - Organization Form System

## 📋 Overview

Sistem ini menyediakan interface web untuk berinteraksi dengan FHIR Organization Resource melalui API SatuSehat. Semua operasi menggunakan REST API patterns.

## 🔗 Endpoints

### 1. GET /organization_form/

**Deskripsi**: Menampilkan menu utama dengan semua pilihan operasi

**Method**: GET

**Response**: HTML Page (Menu Dashboard)

**Example**:
```
http://satusehat.test/organization_form/
```

---

### 2. POST /organization_form/create

**Deskripsi**: Membuat organisasi baru di sistem SatuSehat

**Method**: POST

**Request Body** (Form Data):
```
name: string (required, min 3 chars)
type_coding: string (required) - prov|dept|team|govt|edu|other
telecom_system: string (optional) - phone|fax|email|pager|url|sms|other
telecom_value: string (optional)
address_line: string (optional)
city: string (optional)
postal_code: string (optional)
```

**Response**: JSON + HTML Result Page

**Payload yang dikirim ke API SatuSehat**:
```json
{
  "resourceType": "Organization",
  "name": "string",
  "type": [
    {
      "coding": [
        {
          "system": "http://terminology.hl7.org/CodeSystem/organization-type",
          "code": "string"
        }
      ]
    }
  ],
  "telecom": [
    {
      "system": "string",
      "value": "string"
    }
  ],
  "address": [
    {
      "line": ["string"],
      "city": "string",
      "postalCode": "string"
    }
  ]
}
```

**Example cURL**:
```bash
curl -X POST http://satusehat.test/organization_form/create \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "name=RS Mitra Sehat" \
  -d "type_coding=prov" \
  -d "telecom_system=phone" \
  -d "telecom_value=+62-21-5555555"
```

**Success Response**: 200 OK with JSON response from SatuSehat API

**Error Response**: 400 Bad Request with validation errors

---

### 3. POST /organization_form/get_by_id

**Deskripsi**: Mengambil data organisasi berdasarkan ID

**Method**: POST

**Request Body** (Form Data):
```
org_id: string (required) - UUID format
```

**Response**: JSON + HTML Result Page

**Internal API Call**:
```
GET /Organization/{orgId}
```

**Example cURL**:
```bash
curl -X POST http://satusehat.test/organization_form/get_by_id \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "org_id=79add4a3-d95d-41a5-9a77-b7d8b1f7e4e8"
```

**Success Response**: 200 OK with Organization resource

**Error Response**: 404 Not Found or 400 Bad Request

---

### 4. POST /organization_form/get_by_name

**Deskripsi**: Mencari organisasi berdasarkan nama

**Method**: POST

**Request Body** (Form Data):
```
org_name: string (required, min 1 char)
```

**Response**: JSON + HTML Result Page

**Internal API Call**:
```
GET /Organization?name={name}
```

**Example cURL**:
```bash
curl -X POST http://satusehat.test/organization_form/get_by_name \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "org_name=RS Mitra"
```

**Success Response**: 200 OK with Bundle containing matching Organizations

**Error Response**: 404 Not Found or empty Bundle

---

### 5. POST /organization_form/get_by_partof

**Deskripsi**: Mencari sub-organisasi dari organisasi induk

**Method**: POST

**Request Body** (Form Data):
```
partof_id: string (required) - UUID format
```

**Response**: JSON + HTML Result Page

**Internal API Call**:
```
GET /Organization?partOf={parentOrgId}
```

**Example cURL**:
```bash
curl -X POST http://satusehat.test/organization_form/get_by_partof \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "partof_id=79add4a3-d95d-41a5-9a77-b7d8b1f7e4e8"
```

**Success Response**: 200 OK with Bundle containing child Organizations

**Error Response**: 404 Not Found or empty Bundle

---

### 6. POST /organization_form/update

**Deskripsi**: Memperbarui data organisasi yang sudah ada

**Method**: POST

**Request Body** (Form Data):
```
org_id: string (required) - UUID format
name: string (required, min 3 chars)
type_coding: string (required)
telecom_system: string (optional)
telecom_value: string (optional)
address_line: string (optional)
city: string (optional)
postal_code: string (optional)
```

**Response**: JSON + HTML Result Page

**Internal API Call**:
```
PUT /Organization/{orgId}
```

**Payload yang dikirim ke API SatuSehat**:
```json
{
  "resourceType": "Organization",
  "id": "string",
  "name": "string",
  "type": [
    {
      "coding": [
        {
          "system": "http://terminology.hl7.org/CodeSystem/organization-type",
          "code": "string"
        }
      ]
    }
  ],
  "telecom": [
    {
      "system": "string",
      "value": "string"
    }
  ],
  "address": [
    {
      "line": ["string"],
      "city": "string",
      "postalCode": "string"
    }
  ]
}
```

**Example cURL**:
```bash
curl -X POST http://satusehat.test/organization_form/update \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "org_id=79add4a3-d95d-41a5-9a77-b7d8b1f7e4e8" \
  -d "name=RS Mitra Sehat Updated" \
  -d "type_coding=dept"
```

**Success Response**: 200 OK with updated Organization resource

**Error Response**: 404 Not Found, 400 Bad Request, or 409 Conflict

---

## 📊 Response Format

### Success Response Format
```html
- HTTP Status: 200 OK
- Display: HTML page with:
  - Success alert box
  - Request information (ID, Name, etc.)
  - JSON response in formatted code block
  - Navigation buttons to return to menu or form
```

### Error Response Format
```html
- HTTP Status: 400/404/500
- Display: HTML page with:
  - Error alert box with error message
  - Navigation buttons to return to menu or form
```

## 🔐 Authentication

Aplikasi ini menggunakan library `Satusehat/Core/SatusehatClient` untuk authentication.

**Token Configuration** (dalam `application/config/satusehat.php`):
```php
$config['satusehat']['client_id'] = 'YOUR_CLIENT_ID';
$config['satusehat']['client_secret'] = 'YOUR_CLIENT_SECRET';
$config['satusehat']['organization_id'] = 'YOUR_ORGANIZATION_ID';
```

Setiap request ke API SatuSehat secara otomatis menambahkan Authorization header:
```
Authorization: Bearer {access_token}
```

## 🎯 Validation Rules

### Create Organization
- `name`: Required, minimum 3 characters, maximum 255 characters
- `type_coding`: Required, must be one of: prov, dept, team, govt, edu, other
- `telecom_system`: Optional, valid values: phone, fax, email, pager, url, sms, other
- `telecom_value`: Optional, required if telecom_system provided
- `address_line`: Optional, maximum 255 characters
- `city`: Optional, maximum 100 characters
- `postal_code`: Optional, maximum 10 characters

### Get by ID
- `org_id`: Required, UUID format (36 characters)

### Get by Name
- `org_name`: Required, minimum 1 character, maximum 255 characters

### Get by PartOf
- `partof_id`: Required, UUID format (36 characters)

### Update Organization
- `org_id`: Required, UUID format
- `name`: Required, minimum 3 characters
- `type_coding`: Required
- (Other fields optional)

## 📈 Status Codes

| Code | Description |
|------|-------------|
| 200 | Success - Request processed successfully |
| 400 | Bad Request - Validation error or missing required field |
| 404 | Not Found - Resource not found |
| 409 | Conflict - Conflict during update operation |
| 500 | Internal Server Error - Server error in API |

## 🔄 Flow Diagram

```
┌─────────────┐
│   Browser   │
└──────┬──────┘
       │
       ▼
┌─────────────────────┐
│ Organization Form   │
│   (Controller)      │
└──────┬──────────────┘
       │
       ▼
┌─────────────────────┐
│ Organization Model  │
│   (Business Logic)  │
└──────┬──────────────┘
       │
       ▼
┌─────────────────────┐
│ Organization Lib    │
│   (FHIR Resource)   │
└──────┬──────────────┘
       │
       ▼
┌─────────────────────┐
│ SatusehatClient     │
│   (HTTP Client)     │
└──────┬──────────────┘
       │
       ▼
┌─────────────────────┐
│  SatuSehat API      │
│   (Remote Server)   │
└─────────────────────┘
```

## 💡 Usage Examples

### JavaScript/Fetch API Example

```javascript
// Create Organization
async function createOrganization() {
  const formData = new FormData();
  formData.append('name', 'RS Mitra Sehat');
  formData.append('type_coding', 'prov');
  formData.append('telecom_system', 'phone');
  formData.append('telecom_value', '+62-21-5555555');

  try {
    const response = await fetch('/organization_form/create', {
      method: 'POST',
      body: formData
    });
    
    const result = await response.text();
    console.log(result);
  } catch (error) {
    console.error('Error:', error);
  }
}

// Get Organization by ID
async function getOrganization(orgId) {
  const formData = new FormData();
  formData.append('org_id', orgId);

  try {
    const response = await fetch('/organization_form/get_by_id', {
      method: 'POST',
      body: formData
    });
    
    const result = await response.text();
    console.log(result);
  } catch (error) {
    console.error('Error:', error);
  }
}
```

## 📝 Notes

1. Semua request form data akan di-validate server-side sebelum dikirim ke API
2. Temporary files (JSON payload) akan otomatis dihapus setelah request selesai
3. Response dari API SatuSehat ditampilkan as-is dalam format JSON yang diformat
4. Semua exception dan error ditangani dengan graceful error messages
5. URL harus accessible melalui virtual host `satusehat.test`

---

**Last Updated**: January 26, 2026
**API Version**: v1
**Framework**: CodeIgniter 3
