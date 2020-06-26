<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Laravel WebApp for Parking Vehicles
Setup:
**1. Clone the repository**

 ```bash
git clone https://github.com/Bellov/vehicle_parking
```

**2. Configure MariaDB database**

```bash
CREATE DATABASE parking
```
```bash
GRANT ALL PRIVILEGES ON DATABASE parking TO your 'user name';
```

```bash
\q
```

**3.  Run the application**

#### Mac Os, Ubuntu and windows users continue here:

* Open the console and cd your project root directory

```bash
composer install
```

```bash
php artisan key:generate
```

```bash
npm install
```

```bash
npm run dev
```

* Then open `.env` and change username and password  as per
MariaDB installation.

```bash
DB_CONNECTION=pgsql
DB_HOST=hostname
DB_PORT=5432
DB_DATABASE=Your database name
DB_USERNAME=Your database username
DB_PASSWORD=Your database password
```

```bash
php artisan migrate
```
```bash
php artisan serve
```
### You can now access the project at localhost:8000

[Home Page](https://localhost:8000)

* The project have queue for sending email 5 minutes after make new record:
```bash
php artisan queue:work
```

## Tool:
 [Mailtrap](https://mailtrap.io/)

* To setup mailtrap just write your user_name / password from the website in `.env`

```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
```
