# Multi-Tenant CRM Using PHP, AWS EC2, and AWS RDS

## Project Overview

This project is a cloud-hosted Multi-Tenant Customer Relationship Management (CRM) system built using PHP and MySQL on AWS.

The application allows multiple companies (tenants) to manage their customers while ensuring data isolation between tenants. The application is hosted on AWS EC2 and uses AWS RDS MySQL as the backend database.

---

## Features

### Authentication
- User Login
- Session Management
- Logout Functionality

### Customer Management (CRUD)
- Create Customer
- View Customers
- Update Customer
- Delete Customer

### Multi-Tenant Architecture
- Each company has its own users and customers
- Users can only access data belonging to their company
- Data isolation implemented using `company_id`

### AWS Integration
- AWS EC2 for application hosting
- AWS RDS MySQL for database management
- Security Groups for secure communication
- Cloud-ready architecture

---

## Architecture

```text
Browser
   |
   v
AWS EC2
(Apache + PHP)
   |
   v
AWS RDS MySQL
```

---

## Technology Stack

| Component | Technology |
|------------|------------|
| Frontend | HTML, Bootstrap 5 |
| Backend | PHP 8 |
| Database | MySQL |
| Cloud Hosting | AWS EC2 |
| Database Hosting | AWS RDS |
| Version Control | Git & GitHub |

---

## Project Structure

```text
crm/
│
├── auth/
│   ├── login.php
│   └── logout.php
│
├── config/
│   └── db.php
│
├── customers/
│   ├── create.php
│   ├── list.php
│   ├── edit.php
│   └── delete.php
│
├── dashboard/
│   └── index.php
│
├── includes/
│   ├── auth.php
│   ├── header.php
│   └── footer.php
│
├── index.php
└── README.md
```

---

## Database Schema

### Companies Table

```sql
CREATE TABLE companies (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255)
);
```

### Users Table

```sql
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT,
    name VARCHAR(100),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);
```

### Customers Table

```sql
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT,
    customer_name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20)
);
```

---

## Installation Steps

### 1. Launch AWS EC2

- Ubuntu Server
- Open Ports:
  - 22 (SSH)
  - 80 (HTTP)
  - 443 (HTTPS)

### 2. Install Apache and PHP

```bash
sudo apt update
sudo apt install apache2 php php-mysql -y
```

### 3. Create AWS RDS MySQL Database

- Create MySQL Instance
- Create Database: `crmdb`
- Configure Security Groups

### 4. Configure Database Connection

Update:

```php
config/db.php
```

with your RDS credentials.

### 5. Run SQL Scripts

Create tables using the SQL scripts provided above.

### 6. Create Initial User

Generate password hash:

```php
echo password_hash("admin123", PASSWORD_DEFAULT);
```

Insert the user into the database.

---

## Security Features

- PDO Prepared Statements
- Password Hashing
- Session-Based Authentication
- Tenant Data Isolation
- SQL Injection Protection

---

## Screenshots

### Login Page

<img width="1366" height="596" alt="Screenshot 2026-06-09 205620" src="https://github.com/user-attachments/assets/fa6b7032-1524-488a-9e2d-51e605d29622" />


### Dashboard

<img width="628" height="370" alt="Screenshot 2026-06-09 211148" src="https://github.com/user-attachments/assets/7c74f304-f6fa-42ed-a18a-170f245c9db8" />


### Customer List

Add screenshot here.

### AWS RDS Console

Add screenshot here.

---

## Future Improvements

- Lead Management Module
- Sales Opportunities Tracking
- Dashboard Analytics
- AWS CloudWatch Monitoring
- Multi-AZ RDS Deployment
- Email Notifications
- Role-Based Access Control (RBAC)

---

## Learning Outcomes

This project demonstrates:

- PHP Web Development
- MySQL Database Design
- AWS EC2 Deployment
- AWS RDS Configuration
- Multi-Tenant Application Design
- CRUD Operations
- Authentication & Authorization
- Cloud-Based Architecture

---

## Author

Your Name

GitHub: https://github.com/yourusername
