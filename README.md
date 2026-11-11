# MiniCRM

A simple CRM (Customer Relationship Management) web application built with **Laravel 11**.

MiniCRM helps manage users, clients, projects, and tasks through a simple web interface with role-based permissions.

## Features

- **Authentication:** User registration and login using Laravel Breeze.
- **User Management:** Create, view, update, and delete users.
- **Client Management:** Manage client records.
- **Project Management:** Organize and manage projects.
- **Task Management:** Create and manage tasks.
- **Role & Permission Management:** Admin and User roles with permissions using Spatie Laravel Permission.
- **Authorization:** Protect delete operations based on user permissions.

## Technologies Used

- PHP 8.4
- Laravel 11
- MySQL / SQLite
- Blade
- Tailwind CSS
- Alpine.js
- Laravel Breeze
- Spatie Laravel Permission

## Installation

1. Clone the repository:

```bash
git clone https://github.com/modricelwakell/minicrm.git
cd minicrm
```

2. Install PHP dependencies:

```bash
composer install
```

3. Create your environment file:

```bash
cp .env.example .env
```

4. Generate the application key:

```bash
php artisan key:generate
```

5. Configure your database in the `.env` file.

6. Run migrations and seed the database:

```bash
php artisan migrate --seed
```

7. Install frontend dependencies:

```bash
npm install
```

8. Build frontend assets:

```bash
npm run build
```

## Admin Account

The database seeder creates a default admin account for local development:

- Email: `admin@gmail.com`
- Password: `password`

**Note:** These are demo credentials for local development only. Do not use them in production.

## License

This project is open-sourced under the MIT license.
