# ✅ PHP Laravel Backend Internship Task
# 🚀 Laravel Deployment on Railway with MySQL


A simple Task Manager application built with Laravel for managing tasks with image uploads.

## 🌐 Live Demo

 [bench-geek-task](https://bench-geek-task-production.up.railway.app/)


## 🧱 Tech Stack

- PHP 8.x
- Laravel 10
- MySQL (via Railway)
- Blade Templating Engine
- Bootstrap 5 (for basic styling)
- Deployed on [Railway](https://railway.app/)

## 📋 Features


- Create, view, update, and delete tasks
- Upload and display images for each task
- Mark tasks as complete or incomplete
- Add due dates for tasks
- Clean UI built using Blade + Bootstrap
- Fully responsive task listing page

## 🚀 Setup Instructions


### 1. Clone the Repository
```bash
git clone https://github.com/your-username/bench-geek-task.git
cd bench-geek-task
```
### 2. Install Dependencies
```bash
composer install
cp .env.example .env
php artisan key:generate --show
```
Set your ```.env``` with local DB credentials or use ```.env.railway ```for production.
### 4. 🚀 Deployment to Railway
##### 1. 🌐 Create a Railway Project
- Go to [Railway](https://railway.com/).
- Create a new project → New Project > Deploy from GitHub Repo.
- Select your Laravel repo.

##### 2. 🛢️ Add a MySQL Plugin
- In your Railway project dashboard, click ```Add Plugin > MySQL```.
- Railway will auto-generate:
```
DB_HOST 
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```
These will be auto-injected into your service as environment variables.

##### 3. ⚙️ Set Environment Variables
In Railway > ```Deployments > Variables```, add the following if not already set:

```env
APP_NAME=Laravel
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:YOUR_KEY_HERE
APP_URL=https://your-app.up.railway.app

DB_CONNECTION=mysql
DB_HOST=your-mysql-host.up.railway.app
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password
```
To generate APP_KEY locally:
```bash
php artisan key:generate --show
```
##### 4. ⚙️ Set Build and Start Commands

Go to Railway → Service → Settings:

- Build Command:
```bash
composer install && php artisan migrate --force
```
- Start Command:

```bash
php artisan serve --host 0.0.0.0 --port 8000
```

##### 5. 🌐 Access the App
Once deployed, Railway provides a URL like:
```
https://your-app.up.railway.app
```
