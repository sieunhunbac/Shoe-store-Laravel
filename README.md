# 👟 ShoeStore - Laravel E-Commerce

A modern, full-featured shoe e-commerce website built with **Laravel**, **TailwindCSS**, and **MySQL**.

## ✨ Features

### Customer Storefront
- 🏠 **Home Page** - Hero section, featured products, new arrivals, categories
- 👟 **Product Listing** - Search, filter by category, sort by price/newest
- 📄 **Product Detail** - Image, sizes, quantity selector, add to cart
- 🛒 **Shopping Cart** - Add/update/remove items, quantity control
- 💳 **Checkout** - Customer info form, COD payment, order creation
- ✅ **Order Success** - Order confirmation with details
- 📋 **My Orders** - Order history for logged-in customers

### Admin Dashboard
- 📊 **Dashboard** - Total products, orders, revenue, pending orders
- 📦 **Product Management** - Full CRUD with image upload
- 🏷️ **Category Management** - Full CRUD
- 📋 **Order Management** - View orders, update status

### Authentication
- 🔐 Login / Register / Logout
- 👤 Role-based access (Admin/Customer)
- 🛡️ Admin middleware protection

## 🛠️ Tech Stack

- **Backend:** PHP Laravel 12
- **Frontend:** Blade Templates + TailwindCSS 3
- **Database:** MySQL
- **Build Tool:** Vite
- **Font:** Inter (Google Fonts)

## 📋 Prerequisites

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL
- Git (optional)

## 🚀 Local Setup

```bash
# 1. Install PHP dependencies
composer install

# 2. Install Node dependencies
npm install

# 3. Copy environment file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Configure MySQL database in .env
# DB_DATABASE=shoe_store
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Create the database
# mysql -u root -e "CREATE DATABASE shoe_store;"

# 7. Run migrations and seeders
php artisan migrate --seed

# 8. Create storage symlink
php artisan storage:link

# 9. Start Vite dev server (in a separate terminal)
npm run dev

# 10. Start Laravel server
php artisan serve
```

Visit: **http://localhost:8000**

## 🔑 Demo Credentials

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@example.com | password |
| Customer | customer@example.com | password |

## 📁 Project Structure

```
shoe-store/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── CategoryController.php
│   │   │   │   ├── ProductController.php
│   │   │   │   └── OrderController.php
│   │   │   ├── AuthController.php
│   │   │   ├── CartController.php
│   │   │   ├── CheckoutController.php
│   │   │   ├── HomeController.php
│   │   │   ├── OrderController.php
│   │   │   └── ProductController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── Cart.php
│       ├── Category.php
│       ├── Order.php
│       ├── OrderItem.php
│       ├── Product.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── CategorySeeder.php
│       ├── ProductSeeder.php
│       └── UserSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── admin.blade.php
│       ├── partials/
│       │   ├── header.blade.php
│       │   ├── footer.blade.php
│       │   └── flash.blade.php
│       ├── admin/
│       ├── auth/
│       ├── cart/
│       ├── checkout/
│       ├── orders/
│       ├── products/
│       └── home.blade.php
└── routes/
    └── web.php
```

## 📊 Database Schema

- **users** - Customer/Admin accounts with role enum
- **categories** - Product categories (Running, Sneakers, Football, Casual)
- **products** - Shoe products with price, sale_price, stock, sizes
- **carts** - Shopping cart (supports auth & guest users)
- **orders** - Customer orders with status tracking
- **order_items** - Individual items within orders

## 🌐 Production Deployment

```bash
# 1. Set environment
APP_ENV=production
APP_DEBUG=false

# 2. Configure database in .env

# 3. Install dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build

# 4. Run migrations
php artisan migrate --seed --force

# 5. Create storage link
php artisan storage:link

# 6. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📝 Sample Data

The seeder includes:
- **4 Categories:** Running Shoes, Sneakers, Football Shoes, Casual Shoes
- **12 Products:** Nike Air Zoom, Adidas Ultraboost, Puma Future, Converse Chuck Taylor, New Balance 574, Vans Old Skool, Nike Air Force 1, Adidas Samba, Mizuno Morelia, Asics Gel Kayano, Jordan Retro, Reebok Classic

## 📄 License

This project is open-sourced for educational/demo purposes.
