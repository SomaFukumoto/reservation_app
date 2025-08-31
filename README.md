# Reservation Management App (Laravel)
(日本語バージョンはページ下部72行目から記載)
This is a web application for managing reservations, ideal for use cases such as salons or clinics.  
It is built with Laravel and supports both customer and admin-side reservation management.

---

## 🔧 Tech Stack

- PHP 8.x (Laravel 10)
- Laravel Breeze (for authentication)
- Blade templating engine
- Eloquent ORM
- SQLite (for local development)
- Bootstrap 5 (UI framework)

---

## ✨ Main Features

### 🧑‍💻 Customer Side
- User registration and login
- View available menus/services
- Create and view reservations

### 🛠 Admin Side
- Manage staff (create, update, delete)
- Manage service menus (create, update, delete)
- View all reservations

---

## 📸 Screenshots (optional)

> Add screenshots of key pages here if available, such as:
> - Reservation form
> - Admin panel
> - Login screen

---

## 🚀 Getting Started (Local Setup)

```bash
git clone https://github.com/SomaFukumoto/reservation_app.git
cd reservation_app

# Copy .env and generate app key
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start development server
php artisan serve


├── app/
│   ├── Http/Controllers/
│   ├── Models/
├── resources/views/
├── routes/web.php
├── database/migrations/







# 予約管理アプリ（Reservation Management App）

このアプリは、美容室などの予約管理業務を想定したWebアプリケーションです。Laravelを用いて開発しており、管理者とユーザーの双方での予約管理が可能です。

---

## 🔧 使用技術スタック

- PHP 8.x（Laravel 10）
- Laravel Breeze（認証機能）
- Bladeテンプレートエンジン
- Eloquent ORM
-  mysql（ローカル開発用DB）
- Bootstrap 5（UI）

---

## ✨ 主な機能

### 🧑‍💻 ユーザー側（Customer）
- アカウント登録・ログイン
- メニュー一覧からの予約
- 自身の予約確認

### 🛠 管理者側（Admin）
- スタッフ管理（作成・編集・削除）
- メニュー管理（作成・編集・削除）
- 予約状況の一覧確認


---


---

## 🚀 セットアップ方法（ローカル開発用）

```bash
git clone https://github.com/SomaFukumoto/reservation_app.git
cd reservation_app

# .env ファイルのコピーとキー生成
cp .env.example .env
php artisan key:generate

# DBマイグレーション
php artisan migrate

# 開発サーバー起動
php artisan serve


├── app/
│   ├── Http/Controllers/
│   ├── Models/
├── resources/views/
├── routes/web.php
├── database/migrations/






