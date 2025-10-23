# HỆ THỐN QUẢN LÝ SỰ KIỆN CHO SINH VIÊN

[![Laravel](https://img.shields.io/badge/Laravel-12.x-ff2d20?style=flat&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777bb4?style=flat&logo=php&logoColor=white)](https://www.php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)
 ## MỤC ĐÍCH
 Web giúp sinh viên dễ dàng quản lý thời gian để lên lịch trình cho việc tham gia các hoạt động
---
### TÍNH NĂNG 
* Xác thực người dùng
* Quản lý dự án
* Quản lý công việc con (Subtasks)
* Thống kê và báo cáo
* Quản lý người dùng
* Nhắc nhở & Tự động hóa
* Giao diện người dùng
* Bảo mật & Kiểm tra
---
## MÔ HÌNH DỮ LIỆU
### USERS
| Cột | Kiểu dữ liệu | Ý nghĩa |
|---|---|---|
| id | `bigint unsigned` | Khóa chính |
| name | `varchar(255)` | Tên người dùng |
| email | `varchar(255), unique` | Email đăng nhập |
| password | `varchar(255)` | Mật khẩu đã mã hóa |
| role | `enum('student','admin')` | Phân quyền |
| created_at / updated_at | `timestamp` | Dấu thời gian tạo/cập nhật |
### EVENTS
| Cột | Kiểu dữ liệu | Ý nghĩa |
|---|---|---|
| id | `bigint unsigned` | Khóa chính |
| title | `varchar(255)` | Tên sự kiện |
| description | `text` | Mô tả chi tiết |
| start_time / end_time | `datetime` | Thời gian diễn ra |
| location | `varchar(255)` | Địa điểm |
| max_participants | `int` | Số lượng tham gia tối đa |
| is_active | `tinyint(1)` | Trạng thái hoạt động |
| created_at / updated_at | `timestamp` | Dấu thời gian tạo/cập nhật |
### EVENT REGISTRATIONS
| Cột | Kiểu dữ liệu | Ý nghĩa |
|---|---|---|
| id | `bigint unsigned` | Khóa chính |
| user_id | `bigint unsigned` | Khóa ngoại → users.id |
| event_id | `bigint unsigned` | Khóa ngoại → events.id |
| registered_at | `timestamp` | Thời gian sinh viên đăng ký |
| created_at / updated_at | `timestamp` | Dấu thời gian hệ thống |
---
### CÔNG NGHỆ SỬ DỤNG
 #### Backend
* Framework: Laravel 12.x
* Language: PHP 8.2+
* Database: MySQL
 #### Frontend
* Tailwind CSS: Design
* Vite
* Blade Template Engine
 #### Khác
* Composer – Manage PHP packages
* NPM – Install and build front-end packages
* Artisan CLI – internal management
* Git / GitHub – version control
---

## 🗂️ Projects Management (API)

| Method | Endpoint | Description |
|:-------|:----------|:-------------|
| **GET** | `/api/projects` | Lấy danh sách dự án |
| **POST** | `/api/projects` | Tạo dự án mới |
| **GET** | `/api/projects/{id}` | Lấy chi tiết dự án |
| **PUT** | `/api/projects/{id}` | Cập nhật thông tin dự án |
| **DELETE** | `/api/projects/{id}` | Xóa dự án |

---

## 📊 Statistics (API)

| Method | Endpoint | Description |
|:-------|:----------|:-------------|
| **GET** | `/api/project-stats` | Lấy thống kê tổng quan dự án qua API |

---

## 🌐 Web Interface (Routes giao diện Web)

| Method | Endpoint | Description |
|:-------|:----------|:-------------|
| **GET** | `/` | Trang chủ |
| **GET** | `/dashboard` | Dashboard chính |
| **GET** | `/projects` | Danh sách dự án |
| **GET** | `/projects/create` | Tạo dự án mới (form) |
| **GET** | `/projects/{id}` | Xem chi tiết dự án |
| **GET** | `/projects/{id}/edit` | Chỉnh sửa dự án |
| **GET** | `/profile` | Xem hồ sơ cá nhân |
| **PATCH** | `/profile` | Cập nhật hồ sơ cá nhân |
| **DELETE** | `/profile` | Xóa tài khoản |
| **GET** | `/stats` | Trang thống kê chi tiết |
| **GET** | `/stats/export/{format}` | Xuất báo cáo (CSV, JSON, PDF) |
| **GET** | `/stats/report` | Báo cáo nâng cao |

---

## ✅ Subtasks Management (API)

| Method | Endpoint | Description |
|:-------|:----------|:-------------|
| **POST** | `/projects/{id}/subtasks` | Tạo công việc con trong dự án |
| **PATCH** | `/subtasks/{id}/toggle` | Chuyển đổi trạng thái công việc con |
| **DELETE** | `/subtasks/{id}` | Xóa công việc con |

---

## 🔐 Authentication (API & Web)

| Method | Endpoint | Description |
|:-------|:----------|:-------------|
| **GET** | `/login` | Trang đăng nhập |
| **POST** | `/login` | Gửi thông tin đăng nhập |
| **POST** | `/logout` | Đăng xuất |
| **GET** | `/register` | Trang đăng ký |
| **POST** | `/register` | Gửi thông tin đăng ký |
| **GET** | `/verify-email` | Gửi email xác thực |
| **GET** | `/verify-email/{id}/{hash}` | Xác nhận email |
| **GET** | `/forgot-password` | Trang quên mật khẩu |
| **POST** | `/forgot-password` | Gửi email reset mật khẩu |
| **GET** | `/reset-password/{token}` | Trang đổi mật khẩu |
| **POST** | `/reset-password` | Cập nhật mật khẩu mới |

---

## 👩‍🎓 Student Routes (Web)

| Method | Endpoint | Description |
|:-------|:----------|:-------------|
| **GET** | `/student/events` | Danh sách sự kiện sinh viên |
| **GET** | `/student/events/{event}` | Xem chi tiết sự kiện |
| **POST** | `/student/events/{event}/register` | Đăng ký tham gia sự kiện |
| **DELETE** | `/student/events/{event}/unregister` | Hủy đăng ký tham gia sự kiện |
| **GET** | `/student/my-events` | Danh sách sự kiện của tôi |

---

## 🧩 Admin Routes (Web)

| Method | Endpoint | Description |
|:-------|:----------|:-------------|
| **GET** | `/admin/dashboard` | Dashboard quản trị |
| **GET** | `/admin/events` | Danh sách sự kiện |
| **POST** | `/admin/events` | Thêm sự kiện mới |
| **GET** | `/admin/events/create` | Form tạo sự kiện |
| **GET** | `/admin/events/{event}` | Chi tiết sự kiện |
| **PUT/PATCH** | `/admin/events/{event}` | Cập nhật sự kiện |
| **DELETE** | `/admin/events/{event}` | Xóa sự kiện |
| **GET** | `/admin/events/{event}/edit` | Form chỉnh sửa sự kiện |
| **GET** | `/admin/events/{event}/registrations` | Danh sách đăng ký sự kiện |
| **GET** | `/admin/registrations` | Toàn bộ danh sách đăng ký |
| **DELETE** | `/admin/registrations/{registration}` | Xóa đăng ký |

---
