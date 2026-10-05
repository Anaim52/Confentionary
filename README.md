# Confentionary

Web application for a confectionery service. Customers, staff and cooks register with separate roles, sign in, and work with custom orders. Built with plain PHP and MySQL.

## Features

- Registration for three account types: customer, staff, cooker
- Session-based login and logout; the role is stored in the session
- Order creation: name, details, size, price (new orders get the status `new`)
- Order list view

## Tech stack

- PHP (no framework), server-side rendered HTML forms
- MySQL / MariaDB (`mysqli`)

## Project structure

```
Confentionary/
├── db/                # Database connection (connection.php)
├── sql/               # Database schema
├── index.php          # Home page, navigation depends on login state
├── register.php       # Registration (customer / staff / cooker)
├── login.php          # Login
├── logout.php         # Logout, ends the session
├── create_order.php   # New order form and handler
├── orders.php         # Order list
└── README.md
```

## Database

Database name: `confentionary`.

| Table       | Columns                                                                  |
| ----------- | ------------------------------------------------------------------------ |
| `customers` | `customer_id` (PK), `name`, `email`, `password`                          |
| `stuff`     | `stuff_id` (PK), `name`, `email`, `password`                             |
| `cookers`   | `cooker_id` (PK), `name`, `email`, `password`                            |
| `orders`    | `order_id` (PK), `order_name`, `order_detail`, `order_size` (INT), `order_price` (INT), `status` |

Each account type has its own table. Orders are not linked to a customer or cooker by a foreign key yet.

## Getting started

### Requirements

- PHP 7.4 or newer with the `mysqli` extension
- MySQL or MariaDB
- Apache/Nginx with PHP, or XAMPP / OpenServer / MAMP for local development

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Anaim52/Confentionary.git
   cd Confentionary
   ```

2. Import the schema from `sql/`. The script creates the `confentionary` database itself:

   ```bash
   mysql -u <user> -p < sql/<schema-file>.sql
   ```

3. Set your database host, user, password and database name in `db/connection.php`.

4. Start a server from the project root, for example:

   ```bash
   php -S localhost:8000
   ```

5. Open `http://localhost:8000`.

## Usage

1. On the home page choose **Login / Register**.
2. Register an account and select a role: Customer, Stuff or Cooker.
3. Log in. The home page then shows your role, **Create Order**, **Orders** and **Logout**.
4. Create an order with a name, details, size and price. It is saved with the status `new`.

## Known security issues

This is a learning-stage project. Do not deploy it publicly before fixing the following:

- **SQL injection.** `register.php` and `create_order.php` build queries from raw `$_POST` values. In `register.php` the `role` field is inserted directly as the table name, so any value sent by the client is executed as part of the query. Use prepared statements and check `role` against a fixed allow-list (`customers`, `stuff`, `cookers`).
- **Plain-text passwords.** `password` is stored as submitted. Use `password_hash()` on registration and `password_verify()` on login, and make the column long enough for the hash.
- **Open privilege selection.** Anyone can register as staff or cooker by choosing that role in the form. Staff and cooker accounts should be created by an administrator.
- **No validation.** Email is not checked for format or uniqueness, and order fields are not validated.
- **No CSRF protection** on forms.

## Roadmap

- Fix the issues above
- Link orders to customers and cooks (foreign keys)
- Order status workflow (new, in progress, ready, delivered)
- Role-based access to pages and actions
- Styling and responsive layout
