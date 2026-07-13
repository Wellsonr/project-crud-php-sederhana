# CRUD Sederhana (CodeIgniter 4)

CRUD data `items` (name, description, price).

## Setup

1. Copy `env` ke `.env`, isi koneksi database di bagian `database.default.*`.
2. Install dependency: `composer install`
3. Jalankan migration: `php spark migrate`

## Run

```
php spark serve --host 0.0.0.0 --port 8000
```

Buka `http://localhost:8000/`.
