## Local Setup

1. Clone the repository
2. Install PHP dependencies:
   composer install
3. Copy environment file:
   cp .env.example .env
4. Generate application key:
   php artisan key:generate
5. Create a MySQL database if necessary, for example:
   CREATE DATABASE laravel_blog;
6. Configure `.env`:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_blog
   DB_USERNAME=root
   DB_PASSWORD=
7. Run migrations:
   php artisan migrate
8. Install frontend dependencies:
   npm install
9. Start Vite:
   npm run dev
10. Start Laravel server:
   php artisan serve
11. Open the app in browser:
   http://127.0.0.1:8000
