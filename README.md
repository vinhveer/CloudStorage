# Cloud Storage

## Prerequisites

* **PHP** ≥ 8.2 and **Composer** 2.x
* **Node.js** ≥ 18 (with npm or pnpm)
* A database (**MySQL/MariaDB** or **SQLite**)
* Git

---

## Setup Project

### Clone the repository

```bash
git clone https://github.com/vinhveer/CloudStorage.git
cd CloudStorage   # or the folder name created by git
```

### Install backend dependencies

```bash
composer install
```

> If Composer complains about PHP extensions (e.g., `mbstring`, `pdo_*`), enable/install them and re-run.

### Copy environment file

```bash
cp .env.example .env
```

### Generate application key

```bash
php artisan key:generate
php artisan config:clear
```

> Fixes “No application encryption key has been specified” if you see it.

### Run database migrations (optionally seed)

```bash
php artisan migrate
# or
php artisan migrate --seed
```

### Public storage symlink

```bash
php artisan storage:link
```

> Makes files in `storage/app/public` accessible under `public/storage`.

### Start the Laravel dev server

```bash
php artisan serve
```

---

## Frontend (Vite)

### Install frontend dependencies

```bash
npm install
```

### Run Vite dev server (HMR)

```bash
npm run dev
```

### (Optional) Run PHP + Vite concurrently

Add scripts to `package.json`:

```json
{
  "scripts": {
    "php": "php artisan serve",
    "dev": "vite",
    "dev:both": "concurrently -k \"npm:php\" \"npm:dev\"",
    "build": "vite build",
    "preview": "vite preview"
  },
  "devDependencies": {
    "concurrently": "^9.0.1"
  }
}
```

Then:

```bash
npm run dev:both
```