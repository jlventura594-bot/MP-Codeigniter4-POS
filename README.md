# CodeIgniter 4 Point-of-Sale System

A midterm project for managing customers, staff, products, and sales.

Group Members:
  - John Laurence Ventura
  - Leann Marie Querubin
  - Kobe Gabrielle Cadorna
  - Neil Francis Floro
  - Mark David Paynor

Repository: https://github.com/jlventura594-bot/MP-Codeigniter4-POS
Hosted Website Link: https://pos-system-midterm.infinityfreeapp.com/index.php/login

## Project Status

- Complete

Live website: To be added after deployment.

## Features

- Staff login and logout using sessions.
- Password hashing and password verification.
- Authentication filters protecting application pages.
- CSRF protection on submitted forms.
- Customer creation, listing, editing, and deletion.
- Staff management with unique usernames.
- Staff avatar uploads with prepared thumbnails.
- Product management with image uploads.
- Sales recording with automatic stock deduction.
- Optional customer selection for walk-in sales.
- Sales history showing product, customer, staff, quantity,
  total price, and date.
- Transaction handling to prevent overselling.
- Detection of stock changes while a product edit form is open.

Customers, staff, and products referenced by sales cannot be
deleted. Staff cannot delete their own signed-in account.

Each sale records one product and its quantity. Historical sale
totals remain unchanged when a product's price is edited.

All authenticated staff currently have the same management access.

## Requirements

- PHP 8.2 or a compatible newer version.
- Composer.
- MySQL or MariaDB.
- PHP extensions: intl, mbstring, mysqli, fileinfo, and gd.
- A writable PHP upload temporary directory.

GD is required for avatar and product image processing.

## Local Setup

### 1. Clone the repository

```bash
git clone https://github.com/jlventura594-bot/MP-Codeigniter4-POS.git
cd MP-Codeigniter4-POS
```

### 2. Install dependencies

```bash
composer install
```

Use the committed composer.lock file to reproduce the project's
dependency versions.

### 3. Import the database

Start MySQL using XAMPP or your local database service.

Create a database named `pos_db`, then import:

```text
database/pos_db.sql
```

The export contains the customers, users, products, and sales tables.

### 4. Configure the environment

Create a file named `.env` in the project root.

For a typical local XAMPP installation:

```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = pos_db
database.default.username = root
database.default.password = ''
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Change the database credentials to match your installation.

Do not commit your actual `.env` file.

### 5. Check upload directories

These directories must exist and be writable by PHP:

```text
writable/
public/uploads/avatars/
public/uploads/products/
```

The PHP upload temporary directory must also exist and be writable.

If imported database records reference uploaded images, include
the corresponding image files in the upload directories.

### 6. Start the development server

```bash
php spark serve
```

Open:

```text
http://localhost:8080/index.php/login
```

Use an existing staff account from the imported database.
Obtain its login credentials from the backend maintainer.

Passwords are stored as hashes, so the SQL export does not reveal
the original passwords.

## Main Pages

The paths below are application routes. Depending on the server
configuration, the URL may include `index.php`.

| Route | Purpose |
|-------|---------|
| /login | Staff login |
| / | Home |
| /about | About the project |
| /customers | Customer management |
| /users | Staff management |
| /products | Product management |
| /sales | Sales history |
| /sales/new | Record a sale |

Logout uses a POST request.

## Upload Rules

- Accepted formats: JPG and PNG.
- Maximum file size: 2 MB.
- Avatar output: 160 × 160 PNG.
- Product image output: 320 × 320 PNG.
- Generated filenames are stored in the database.
- Missing images use placeholders.

## Frontend Handoff

The main templates are in `app/Views`.
Static assets belong in `public`.

When changing the interface, preserve:

- Form action URLs and HTTP methods.
- Input names and hidden fields.
- Calls to `csrf_field()`.
- Output escaping using `esc()` or existing safe helpers.
- Validation errors and previous form input.
- `enctype="multipart/form-data"` on upload forms.
- The `original_stock_quantity` hidden field on product edits.

Keep image upload forms separate from the main edit forms.
Do not nest HTML forms.

Deletion and logout controls must continue submitting POST forms.

## Hosting Handoff

Planned hosting provider: InfinityFree.

The hosting maintainer must verify PHP and extension compatibility
with this project before deployment.

Production setup includes:

1. Preparing dependencies with:
   `composer install --no-dev --optimize-autoloader`
2. Importing the database into the hosting account's database.
3. Configuring the host-provided database credentials.
4. Setting the actual website URL as `app.baseURL`.
5. Setting `CI_ENVIRONMENT = production`.
6. Configuring the web root and paths for CodeIgniter's public
   entry point.
7. Ensuring runtime and upload directories are writable.
8. Checking login, uploads, sales, stock deduction, and logout
   on the deployed website.

The public entry point is `public/index.php`.
Environment files, SQL exports, application source, and runtime
logs must not be publicly downloadable.

If Composer is unavailable on the host, prepare production
dependencies locally and include `vendor` in the deployment upload.

`php spark serve` is for local development.

The current application timezone is UTC.
