# 📋 Laravel Task List APP

A Laravel application running with Docker (MariaDB + Adminer).

---

## 🛠 Requirements

Make sure you have installed:

- Docker Desktop
- Git
- PHP (only needed for running artisan commands locally if not using container)

---

## 🚀 Installation

Clone the repository:

```bash
git clone https://github.com/mariosabeh2022/Task-List
cd project
```

---

### 1️⃣ Setup Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

---

### 2️⃣ Start Docker Containers

```bash
docker compose up -d
```

This will start:

- **MariaDB** (database)
- **Adminer** (database UI)

---

### 3️⃣ Run Migrations

```bash
php artisan migrate
```

If you have seeders:

```bash
php artisan migrate --seed
```

---

## 🗄 Database Configuration

The application connects using the Docker service name:

```
DB_CONNECTION=mysql  // Or sqlite based on your preference but that would require some changes in docker-compose.yml
DB_HOST=127.0.0.1  // Or mysql based on your preference but that would require some changes in docker-compose.yml
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```

---

## 🧩 Accessing the Database

### Adminer (Database UI)

Open in your browser:

```
http://localhost:8080
```

Login credentials:

- **System:** MySQL
- **Server:** mysql
- **Username:** root
- **Password:** root
- **Database:** laravel

---

## 🛑 Stopping the Containers

```bash
docker compose down
```

To remove database volume as well:

```bash
docker compose down -v
```

---

## 🔐 Security Note

The `.env` file is intentionally not committed to version control.
Always create your own `.env` file from `.env.example`.

---

## 📌 Notes

- If port `3306` is already in use, stop your local MySQL service.
- Make sure Docker Desktop is running before starting containers.
