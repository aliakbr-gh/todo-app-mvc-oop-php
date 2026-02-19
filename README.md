# Todo MVC (Plain PHP)

A lightweight MVC Todo application built with plain PHP, PDO, and MySQL.

## Features

- Authentication (register, login, logout)
- Role-based authorization via route middleware
- Todo CRUD
- Todo image upload (create/update/remove)
- Global request logging (file + database, configurable)
- Global IP rate limiting (configurable per second + block duration)
- Admin-only database backup route
- Reusable debug helpers: `dd()` and `dump()`
- Reusable spinner and toaster partials
- `simple.css`-based semantic UI

## Tech Stack

- PHP 8.x
- MySQL / MariaDB
- Plain MVC architecture (no framework)
- PDO for database access

## Project Structure

```text
mvc/
├── app/
│   ├── controllers/
│   ├── models/
│   └── views/
│       ├── layouts/
│       ├── partials/
│       └── ...
├── bootstrap/
│   └── app.php
├── config/
│   └── config.php
├── core/
│   ├── Auth.php
│   ├── Authorization.php
│   ├── Controller.php
│   ├── Database.php
│   ├── DatabaseBackup.php
│   ├── Logger.php
│   ├── Middleware.php
│   ├── RateLimiter.php
│   ├── Router.php
│   ├── Session.php
│   ├── Uploader.php
│   ├── View.php
│   └── helpers.php
├── routes/
│   └── web.php
├── storage/
│   ├── backups/
│   ├── logs/
│   ├── rate-limit/
│   └── uploads/
├── index.php
└── queries.sql
```

## Setup

## 1. Configure web root

For MAMP, place project at:

`/Applications/MAMP/htdocs/mvc`

Open in browser:

`http://localhost/mvc`

## 2. Configure database

Edit:

`config/config.php`

Default values:

- `DB_HOST=localhost`
- `DB_NAME=todo_mvc`
- `DB_USER=root`
- `DB_PASS=root`
- `BASE_URL=/mvc`

## 3. Create schema

Import:

`queries.sql`

Example:

```sql
SOURCE /Applications/MAMP/htdocs/mvc/queries.sql;
```

## 4. Ensure writeable storage

The app writes to:

- `storage/logs`
- `storage/backups`
- `storage/rate-limit`
- `storage/uploads/todos`

Create folders if needed:

```bash
mkdir -p storage/logs storage/backups storage/rate-limit storage/uploads/todos
```

## Routes

Defined in `routes/web.php`.

### Auth

- `GET /login`
- `POST /login`
- `GET /register`
- `POST /register`
- `GET /logout`

### Todos

- `GET /` (auth + role `admin|manager`)
- `GET /todos` (auth + role `admin|manager`)
- `GET /todos/create` (auth)
- `POST /todos` (auth)
- `GET /todos/edit?id={id}` (auth)
- `POST /todos/update` (auth)
- `POST /todos/delete` (auth)

### Admin

- `GET /admin/backup` (auth + role `admin`)
  - Generates SQL backup and downloads file
  - Also stores backup under `storage/backups`

## Middleware

`core/Middleware.php` provides:

- `Middleware::auth()`
- `Middleware::guest()`
- `Middleware::role([...])`

Route middleware runs in array order, then controller action executes.

## Auth and Roles

- Session-based auth using `Auth::login()` / `Auth::logout()`
- Role checks are middleware-driven
- Roles available in schema:
  - `user`
  - `manager`
  - `admin`

Important current behavior:

- Registration currently sets role to `admin` in `AuthController::register()`.
- Change this to `user` for normal production behavior.

## Logging

Global request logging is done once per request in router dispatch.

Logged fields:

- `user_id`
- `ip`
- `method`
- `path`
- `created_at`

Config (`config/config.php`):

- `LOG_FILE_ENABLED`
- `LOG_DB_ENABLED`
- `LOG_FILE_PATH`

Database table used:

- `logs`

## Rate Limiter

Implemented in `core/RateLimiter.php`, enforced globally before route handling.

Config (`config/config.php`):

- `RATE_LIMIT_ENABLED`
- `RATE_LIMIT_PER_SECOND`
- `RATE_LIMIT_BLOCK_SECONDS`
- `RATE_LIMIT_STORAGE_PATH`

Behavior:

- Tracks requests by IP per-second window
- If limit exceeded, IP is blocked for configured duration
- Returns HTTP `429` with retry-after seconds

## File Uploads

Implemented with reusable `core/Uploader.php`.

Config (`config/config.php`):

- `UPLOAD_MAX_FILE_SIZE`
- `UPLOAD_ALLOWED_EXTENSIONS`
- `UPLOAD_TODO_DIR`

Todo upload behavior:

- Create: optional image
- Update: replace image and/or remove current image
- Delete todo: deletes linked image file

Schema field:

- `todos.image_path`

## Debug Helpers

From `core/helpers.php`:

- `dd(...$values)`:
  - dumps values
  - shows file/line/time
  - stops execution
- `dump(...$values)`:
  - dumps values
  - continues execution

## UI Notes

- Layout uses [simple.css](https://cdn.simplecss.org/simple.min.css)
- Spinner is isolated in:
  - `app/views/partials/spinner.php`
- Toaster is isolated in:
  - `app/views/partials/toaster.php`

## Common Maintenance

## Change role for an existing user

```sql
UPDATE users SET role = 'admin' WHERE email = 'you@example.com';
UPDATE users SET role = 'manager' WHERE email = 'you@example.com';
```

## Add `image_path` on an existing `todos` table

```sql
ALTER TABLE todos ADD COLUMN image_path VARCHAR(255) NULL AFTER description;
```

## Troubleshooting

- `Too many redirects`:
  - Clear browser cookies once
  - Verify `BASE_URL` in `config/config.php`
  - Ensure user exists for session `user_id`
- `429 Too Many Requests`:
  - Lower request rate
  - or adjust limiter config
- Backup route not accessible:
  - Ensure logged-in user role is `admin`

## License

This project is currently internal/private unless you add your own license file.
