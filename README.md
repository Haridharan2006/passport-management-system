# 🛂 Passport Management System

A full-stack web application to manage passport applications, applicants, verification, payments, and passport issuance using **PHP, Oracle Database, HTML, CSS, and JavaScript**.

---

## 🚀 Features

* ✅ Add, Update, Delete Applicants
* 🔍 Search Applicant by ID
* 📄 Manage Passport Applications
* 💳 Payment Handling
* ✔️ Verification Status Tracking
* 🛂 Passport Issuance & Status
* 📊 View Complete Data (Joined Tables)
* ⏮️ First & Last Record Navigation

---

## 🏗️ Tech Stack

| Layer    | Technology            |
| -------- | --------------------- |
| Frontend | HTML, CSS, JavaScript |
| Backend  | PHP                   |
| Database | Oracle (SQL*Plus)     |
| Server   | XAMPP (Apache)        |

---

## 📁 Project Structure

```
passport-system/
│
├── backend/
│   ├── db.php
│   ├── addApplicant.php
│   ├── addApplication.php
│   ├── addPassport.php
│   ├── addPayment.php
│   ├── addVerification.php
│   ├── deleteApplicant.php
│   ├── updateApplicant.php
│   ├── searchApplicant.php
│   ├── getCompleteData.php
│   ├── setup.php
│
├── frontend/
│   ├── index.html
│   ├── script.js
│   ├── style.css
│
├── sql/
│   ├── tables.sql
```

---

## ⚙️ Setup Instructions

### 1️⃣ Clone the Repository

```
git clone https://github.com/yourusername/passport-management-system.git
```

### 2️⃣ Move to XAMPP Folder

```
C:\xampp\htdocs\
```

### 3️⃣ Start Services

* Start **Apache**
* Start **Oracle DB**

---

### 4️⃣ Configure Database Connection

Edit `backend/db.php`:

```php
$conn = oci_connect("system", "your_password", "localhost/XEPDB1");
```

---

### 5️⃣ Create Tables

Run in browser:

```
http://localhost/passport-system/backend/setup.php
```

---

### 6️⃣ Run the Project

```
http://localhost/passport-system/frontend/index.html
```

---

## 🧠 Concepts Used

* Relational Database Design
* SQL Joins (Multi-table queries)
* CRUD Operations
* API Handling using Fetch
* Dynamic UI Rendering

---

## 🔮 Future Enhancements

* 🔐 User Authentication (Login System)
* 📱 Responsive Mobile UI
* 📊 Dashboard Analytics
* 📁 Document Upload Feature

---

## 👨‍💻 Author

**Haridharan B S**

---

## ⭐ Acknowledgement

This project was developed as part of academic learning to understand real-world database applications and full-stack development.

---

## 📌 Note

Make sure Oracle services and XAMPP are running before executing the project.

---
