# PHP/MySQL Basic POS System

A secure, lightweight Point of Sale (POS) system built with PHP and MySQL, featuring role-based access control for Administrators and Cashiers, inventory management, and sales reporting.

---

## Features

- **Authentication & Authorization**: Secure role-based login system separating Admin and Cashier capabilities.
- **Inventory Management**: Create, update stock, monitor costs, and delete products safely (prevents deletion of products already logged in sales).
- **Point of Sale (Cashier)**: Real-time cart calculation, cash calculation, change computation, and transactional checkout.
- **Sales Reporting**: Filter and generate sales reports by Day, Month, or Year with total profit computation taking product costs into account.
- **Robust Security**:
  - **Password Security**: Uses standard `password_hash()` and `password_verify()` with PHP's bcrypt implementation.
  - **CSRF Protection**: All state-changing requests (forms, cart clearing, item cancellation, role updates) require validated session CSRF tokens.
  - **SQL Injection Prevention**: PDO prepared statements used across all database interactions.
  - **Safe Configuration**: Credentials abstracted into a dedicated git-ignored config file (`includes/config.php`).

---

## Setup & Installation

1. **Clone & Place Repository**:
   Copy the project folder into your web server document root (e.g., `C:\xampp\htdocs\Basic POS`).

2. **Database Setup**:
   - Open phpMyAdmin or your MySQL IDE.
   - Run the provided schema script located at `database/schema.sql`.
   - This will create the `pos_system` database, tables (`users`, `products`, `sales`), and seed default accounts.

3. **Configure Connection**:
   - Copy `includes/config.sample.php` to `includes/config.php`.
   - Update `includes/config.php` with your database credentials if necessary:
     ```php
     return [
         'db' => [
             'host' => 'localhost',
             'name' => 'pos_system',
             'user' => 'root',
             'pass' => ''
         ]
     ];
     ```

4. **Run Application**:
   Navigate to `http://localhost/Basic POS/index.php` in your web browser.

---

## Default User Credentials

Both accounts are seeded with the bcrypt hash corresponding to the password below:

| Username | Password | Role    | Access Level |
| :------- | :------- | :------ | :----------- |
| `admin`  | `password` | Admin   | Full admin dashboard, users, products, and reporting |
| `cashier`| `password` | Cashier | POS POS checkout screen |

---

## Directory Structure

```text
├── admin/                  # Administrator operations & UI (users, inventory, reports)
├── cashier/                # Cashier interface & POS transactions
├── css/                    # Stylesheets
├── database/
│   └── schema.sql          # Database initialization script
├── includes/
│   ├── config.sample.php  # Template for database parameters
│   ├── config.php         # Active database configurations (git-ignored)
│   ├── db_connection.php  # PDO connection helper
│   └── functions.php      # Auth helpers and CSRF security functions
├── index.php              # Login page & entry point
└── logout.php             # Session destruction & logout redirect
```
