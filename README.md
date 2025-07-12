# 🧑‍💻 Simple User Management App (PHP + MySQL)

A basic web app built with **PHP**, **MySQL**, **HTML**, and **CSS** that lets you:

- Add users (Name + Age)
- Store data in a MySQL database
- Display users in a styled table
- Toggle user status (0 ↔ 1)

---

## 📷 Screenshot

<img width="1366" height="689" alt="web page (2)" src="https://github.com/user-attachments/assets/0be6c70c-46f3-4db5-bf0e-312351f1db37" />

<img width="1366" height="697" alt="database" src="https://github.com/user-attachments/assets/6f0d94fa-0a3c-4341-9fca-302200786882" />

---

## 🧰 Technologies Used

- PHP
- MySQL
- HTML / CSS
- XAMPP (for local dev)

---

## ⚙️ Setup Instructions

### 1. Clone the Repository
git clone https://github.com/your-username/user-management-app.git 


---

### 2. Move Project to XAMPP
Copy the folder to:
```C:\xampp\htdocs\user-management-app```


---

### 3. Create Database
Open phpMyAdmin
Import the database.sql file
Or write this code:

``` 
CREATE DATABASE user_db;

USE user_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    status TINYINT(1) DEFAULT 0
);
```


---

### 4. Run the App
Start Apache & MySQL in XAMPP.

Open:
http://localhost/user-management-app/index.php


---

✅ Features
Clean, modern UI

Instant data update

Toggle logic using PHP

Easy to extend with JavaScript
