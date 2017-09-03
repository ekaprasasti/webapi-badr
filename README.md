# WebAPI Badr

WebAPI ini di buat menggunakan Laravel 5.4

## Installation

```bash
git clone https://github.com/ekaprasasti/webapi-badr.git 
```

### Update composer

```bash
cd webapi-badr
composer install 
```

Untuk menginstall composer klik [di sini](https://laravel.com/docs/5.4/installation).

### Configurasi Database

Rename file `.env.example` menjadi `.env` dan edit dengan mencocokan value konfigurasi database pada localhost:

```bash
DB_CONNECTION=mysql
DB_HOTS=127.0.0.1
DB_PORT=3306
DB_DATABASE=sesuaikan_dengan_database_anda
DB_USERNAME=sesuaikan_dengan_username_database
DB_PASSWORD=sesuaikan_dengan_password_database
```

### Install Valet

Project ini menggunakan Valet sebagai web server. Untuk menginstall Valet lihat caranya [di sini](https://laravel.com/docs/5.4/valet).

## API Endpoint

### Register

**POST** `http://webapi-badr.dev/api/freedom/auth/register`

Request body:

```bash
{
  "email": "me_two@example.com",
  "password": "password123",
  "confirmation_password": "password123"
}
```

Response success:

```bash
{
    "success": true,
    "message": "user registration success",
    "data": null
}
```

Response failed:

```bash
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email has already been taken."
        ]
    }
}
```

### Login

**POST** `http://webapi-badr.dev/api/freedom/auth/login`

Request body:

```bash
{
  "email": "ekaprasasti@example.com",
  "password": "password123"
}
```

Response success:

```bash
{
    "success": true,
    "message": "you are successfully logged in",
    "data": {
        "id": 2,
        "name": "ekaprasasti@example.com",
        "photo": "http://188.166.247.62/freedom/users/1eeabd7c-fe2d-4b15-8a7c-d3d1768f19a1/avatar/",
        "email": "ekaprasasti@example.com",
        "access_token": "$2y$10$Ab7dny39DZPzv5Aq1HKoa.wrH662v3Zo.bu.FrGRIPnTJMDTWiZ32"
    }
}
```

Response failed:

```bash
{
    "success": false
}
```

### Logout

**POST** `http://webapi-badr.dev/api/freedom/auth/logout`

Response success:

```bash
{
  "success": true,
  "message": "you are successfully logged out",
  "data": null
}
```

Response failed:

```bash
{
  "success": false
}
```
