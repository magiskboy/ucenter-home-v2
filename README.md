# UCenter + UCHome + Discuz!

Gói tích hợp **UCenter 1.5.1**, **UCHome 2.0**, **Discuz! 7.2** (SC UTF-8), chạy bằng Docker. Dữ liệu cấu hình và upload được persist qua volume.

---

## Yêu cầu

- Docker, Docker Compose
- Port 80 (web), 8081 (Adminer, tùy chọn)

---

## Chạy nhanh (Docker)

```bash
docker-compose up -d
```

Truy cập: **http://127.0.0.1/** (hoặc hostname tương ứng).

Các bước cài đặt bên dưới thực hiện **theo đúng thứ tự** qua trình duyệt.

---

## Cài đặt (theo thứ tự)

### 1. UCenter

- **URL:** http://127.0.0.1/ucenter/install/

| Mục | Giá trị |
|-----|--------|
| DB host | `db` |
| DB user | `root` |
| DB pass | `uchome` |
| DB name | `uchome` |

---

### 2. UCHome (Trang chủ)

- **URL:** http://127.0.0.1/home/install/

**Kết nối UCenter**

| Mục | Giá trị |
|-----|--------|
| UCenter URL | http://127.0.0.1/ucenter |
| Mật khẩu Founder UCenter | `uchome` |

**Kết nối database**

| Mục | Giá trị |
|-----|--------|
| DB host | `db` |
| DB user | `root` |
| DB pass | `uchome` |
| DB name | `uchome` |

---

### 3. Discuz! BBS

- **URL:** http://127.0.0.1/bbs/install/

**Kết nối UCenter**

| Mục | Giá trị |
|-----|--------|
| UCenter URL | http://127.0.0.1/ucenter |
| Mật khẩu Founder UCenter | `uchome` |

**Kết nối database:** DB host `db`, cùng user/pass/database như trên (ví dụ `uchome`).

---

### 4. Ứng dụng UCHome

Sau khi UCHome và UCenter đã cài xong:

| Ứng dụng | URL cài đặt |
|----------|-------------|
| **QQFarm** | http://127.0.0.1/home/qqfarm/core/install/ |
| **Fish (Ao cá)** | http://127.0.0.1/home/fish/install/ |

**Lưu ý:** `UC_KEY` trong **Home** (`config.php`), **Fish** và **QQFarm** (trong `data/` của từng app) phải **giống nhau**. Như vậy Fish và QQFarm mới đọc được cookie đăng nhập do Home (host app) set và auth đúng khi user vào game.

---

## Thư mục / file trong `data/` (persist)

Các path được mount trong `docker-compose.yml`:

```
data/
├── uchome.com/
│   └── admin/
│       └── UploadFiles/
├── home/
│   ├── config.php
│   ├── attachment/
│   ├── data/
│   ├── uc_client/
│   │   └── data/
│   ├── fish/
│   │   └── data/
│   └── qqfarm/
│       └── core/
│           └── data/
├── ucenter/
│   └── data/
└── bbs/
    ├── attachments/
    ├── forumdata/
    └── uc_client/
        └── data/
```

---

## Cấu trúc thư mục (tóm tắt)

```
.
├── conf/              # Apache virtualhost
├── www/               # Code (ucenter, home, bbs, install)
├── data/              # Dữ liệu persist (cây thư mục bên trên)
├── docker-compose.yml
├── Dockerfile
├── readme.txt         # Hướng dẫn cài đặt gốc
└── README.md
```

---

## Adminer

Quản lý DB tại **http://127.0.0.1:8081** (server: `db`, user: `root`, password: `uchome`).
