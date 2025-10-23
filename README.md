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
