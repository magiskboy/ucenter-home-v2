# Migration QQFarm – Đã thực hiện & Bước tiếp theo

## Đã thực hiện

1. **Copy qqfarm vào UCenter Home**  
   Thư mục `qqfarm` đã được copy vào `ucenter-home/www/home/qqfarm/`.

2. **File gateway**  
   Đã tạo `www/home/qqfarm.php`: load `common.php` rồi `qqfarm/qqfarm.inc.php`, có gọi `checklogin()` để bắt buộc đăng nhập.

3. **Cấu hình QQFarm**  
   Đã cập nhật `www/home/qqfarm/core/data/_qsc.php`:
   - DB: `dbhost=db`, `dbuser=root`, `dbpass=uchome`, `dbname=uchome`
   - `tbprefix=uchome_`, `cookiepre=uchome_`
   - `UC_KEY`, `UC_API` lấy từ UCHome `config.php`
   - `closefarm=0` (mở nông trại)

4. **Link menu**  
   Đã thêm mục "Nông trại" trong menu trái (template `template/vi_VN/header.htm`), trỏ tới `qqfarm.php`.

---

## Bước bạn cần làm (khi có MySQL + PHP)

### 1. Chạy cài đặt database QQFarm

**Cách A – Qua trình duyệt (khuyến nghị)**  
Khi stack (web + MySQL) đã chạy:

1. Mở: `http://<domain>/home/qqfarm/core/install/`
2. Nếu cài đặt thành công, trang sẽ báo "安装成功" (Cài đặt thành công).
3. **Sau đó xóa hoặc chặn thư mục install:** xóa `www/home/qqfarm/core/install/` hoặc cấu hình web server chặn truy cập vào `/home/qqfarm/core/install/`.

**Cách B – Import SQL thủ công**  
Nếu không chạy được script PHP install:

1. Vào MySQL (cùng database với UCHome, ví dụ `uchome`).
2. Import file: `www/home/qqfarm/core/install/qfarm_uchome.sql`  
   (File này tạo sẵn bảng với prefix `uchome_qqfarm_*`.)
3. Tạo file khóa install để script không chạy lại:  
   `touch www/home/qqfarm/core/data/install.lock`

### 2. Quyền ghi (nếu cần)

Đảm bảo web server có quyền ghi:

- `www/home/qqfarm/core/data/`
- `www/home/qqfarm/core/data/logs/`
- `www/home/qqfarm/core/data/view/` (cache template)

Ví dụ (Linux):  
`chmod -R 775 www/home/qqfarm/core/data/`

### 3. Kiểm tra

- Đăng nhập UCHome, mở `http://<domain>/home/qqfarm.php` (hoặc bấm "Nông trại" trên menu).
- Nếu báo lỗi DB hoặc bảng chưa có, chưa chạy bước 1 (install DB) hoặc kiểm tra lại `_qsc.php` (dbhost/dbname/user/pass).

---

## Cấu trúc sau migration

```
ucenter-home/www/home/
├── qqfarm.php          ← gateway (đã tạo)
├── common.php
├── config.php
└── qqfarm/             ← copy từ repo qqfarm
    ├── qqfarm.inc.php
    ├── template/
    └── core/
        ├── data/_qsc.php   ← đã chỉnh theo UCHome
        ├── config/api/uchome.php
        ├── api/uchome/main.php
        └── install/       ← xóa hoặc chặn sau khi cài xong
            ├── index.php
            ├── qfarm.sql
            └── qfarm_uchome.sql   ← dùng khi import tay
```

Migration file/cấu hình đã xong; chỉ còn **chạy bước 1 (DB)** khi môi trường có MySQL và PHP.
