# Job Board Management System

## Project Overview
The **Job Board Management System** is a web application that allows employers to post job listings and job seekers to browse and apply for jobs. It includes authentication, job posting features, and an application management system.

## Features

### User Authentication
- Users can register, log in, and reset passwords.
- Role-based access (Admin, Employer, Job Seeker).

### Job Listings
- Employers can create, update, and delete job posts.
- Job seekers can browse available jobs.

### Job Applications
- Job seekers can apply for jobs with uploaded resumes.
- Employers can view and manage applications.

### Dashboard
- Employers see their posted jobs and applications.
- Job seekers see applied jobs.
- Admins manage users and job posts.

### Search & Filtering
- Users can filter jobs by category, location, and company.

### Security & Performance
- Data validation, error handling, and secure authentication.

## How It Works

### User Registration/Login
- Employers and Job Seekers create accounts and log in.

### Employer Actions
- Create job listings with details (title, description, salary, location).
- View applications for their job listings.

### Job Seeker Actions
- Browse available jobs.
- Apply for jobs with uploaded resumes.

### Admin Actions
- Manage users, jobs, and applications.

## Technologies Used
- **Backend:** Laravel (PHP, MySQL)
- **Frontend:** Blade Templates, Bootstrap
- **Database:** MySQL
- **Authentication:** Laravel Breeze/Sanctum



## Installation & Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/wardahsharif/laravel-jobboard.git
   
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Set up environment variables:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure database in `.env` file and run migrations:
   ```bash
   php artisan migrate --seed
   ```
5. Serve the application:
   ```bash
   php artisan serve
   ```

## Expected Outcome
A fully functional **Job Board System** where employers can post jobs, job seekers can apply, and admins manage the platform.

# job-board
