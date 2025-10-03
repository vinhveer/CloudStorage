# Cloud Storage

## Setup Project

**First, Clone Project**

```bash
git clone https://github.com/vinhveer/CloudStorage.git
cd cloud-storage
```

**Copy file .env.example to .env**

```bash
cp .env.example .env
```

**Generate Key**

```bash
php artisan key:generate
```

**Migration Database**

```bash
php artisan migrate
```

**Start Server Dev**

```bash
php artisan serve
```
