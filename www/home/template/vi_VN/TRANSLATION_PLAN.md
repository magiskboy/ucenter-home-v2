# Kế hoạch dịch template vi_VN (UCHome)

Chia nhỏ theo **nhóm chức năng** và **độ ưu tiên** (hiển thị nhiều → ít). Số trong `()` là số dòng có chữ Hán ước lượng (để biết file “nặng” cần dịch).

**Đường dẫn:** Tất cả file dùng đường dẫn đầy đủ từ root repo, ví dụ `./www/home/template/vi_VN/header.htm`.

---

## Phase 1 — Layout & Trang chính (ưu tiên cao)

**Mục tiêu:** User vào site thấy tiếng Việt ngay (header, footer, trang chủ, feed).

| # | File | Ghi chú |
|---|------|--------|
| 1 | `./www/home/template/vi_VN/header.htm` | Đã dịch (menu, nav). Chỉ kiểm tra lại. |
| 2 | `./www/home/template/vi_VN/footer.htm` | (9) Footer, link, copyright. |
| 3 | `./www/home/template/vi_VN/index.htm` | (21) Trang chủ chưa đăng nhập. |
| 4 | `./www/home/template/vi_VN/space_index.htm` | (36) Trang “Trang chủ / My Space” sau khi đăng nhập. |
| 5 | `./www/home/template/vi_VN/space_feed.htm` | (69) Bảng tin / feed chính. |
| 6 | `./www/home/template/vi_VN/showmessage.htm` | (4) Popup/thông báo hệ thống. |
| 7 | `./www/home/template/vi_VN/iframe.htm` | (11) Iframe dùng chung. |

**CSS (không cần dịch nội dung, chỉ giữ/kiểm tra):** `./www/home/template/vi_VN/style.css`, `./www/home/template/vi_VN/space.css`, `./www/home/template/vi_VN/album.css`, `./www/home/template/vi_VN/blog.css`, `./www/home/template/vi_VN/poll.css`, `./www/home/template/vi_VN/thread.css`, `./www/home/template/vi_VN/event.css`, `./www/home/template/vi_VN/doing.css`, `./www/home/template/vi_VN/network.css`

---

## Phase 2 — Đăng nhập / Đăng ký / Hành động cơ bản (do_*)

**Mục tiêu:** Luồng đăng nhập, đăng ký, quên mật khẩu toàn tiếng Việt.

| # | File | Ghi chú |
|---|------|--------|
| 1 | `./www/home/template/vi_VN/do_login.htm` | (15) Trang đăng nhập. |
| 2 | `./www/home/template/vi_VN/do_register.htm` | (34) Trang đăng ký. |
| 3 | `./www/home/template/vi_VN/do_lostpasswd.htm` | (13) Quên mật khẩu. |
| 4 | `./www/home/template/vi_VN/do_inputpwd.htm` | (4) Nhập mật khẩu (ví dụ xem nội dung riêng tư). |
| 5 | `./www/home/template/vi_VN/do_ajax.htm` | (9) Các form/ajax dùng chung. |
| 6 | `./www/home/template/vi_VN/do_stat.htm` | (14) Thống kê (nếu dùng). |
| 7 | `./www/home/template/vi_VN/do_swfupload.htm` | (59) Upload Flash – nhãn, nút, thông báo. |
| 8 | `./www/home/template/vi_VN/sendmail.htm` | (2) Email template. |

---

## Phase 3 — Sidebar & Trang không gian theo module (space_*)

Dịch từng nhóm nhỏ, mỗi nhóm 1 tính năng.

### 3.1 Ghi chép (doing)

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_doing.htm` | (20) Trang ghi chép. |
| `./www/home/template/vi_VN/space_doing_form.htm` | (4) Form ghi chép. |
| `./www/home/template/vi_VN/space_doing_li.htm` | (2) Item trong list. |
| `./www/home/template/vi_VN/space_status.htm` | (3) Cập nhật trạng thái. |

### 3.2 Blog / Nhật ký

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_blog_list.htm` | (47) Danh sách blog. |
| `./www/home/template/vi_VN/space_blog_view.htm` | (37) Xem 1 blog. |
| `./www/home/template/vi_VN/space_comment_li.htm` | (6) 1 comment. |
| `./www/home/template/vi_VN/space_post_li.htm` | (4) 1 bài đăng. |

### 3.3 Album / Ảnh

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_album_list.htm` | (45) Danh sách album. |
| `./www/home/template/vi_VN/space_album_view.htm` | (16) Xem album. |
| `./www/home/template/vi_VN/space_album_pic.htm` | (12) Ảnh trong album. |
| `./www/home/template/vi_VN/space_pic.htm` | (29) Trang ảnh. |

### 3.4 Bình chọn (poll)

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_poll_list.htm` | (29) Danh sách bình chọn. |
| `./www/home/template/vi_VN/space_poll_view.htm` | (50) Xem 1 bình chọn. |

### 3.5 Sự kiện (event)

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_event_list.htm` | (89) Danh sách sự kiện. |
| `./www/home/template/vi_VN/space_event_view.htm` | (134) Xem 1 sự kiện. |

### 3.6 Chủ đề / Topic / Thread

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_topic_list.htm` | (12) Danh sách chủ đề. |
| `./www/home/template/vi_VN/space_topic_view.htm` | (51) Xem chủ đề. |
| `./www/home/template/vi_VN/space_topic_inc.htm` | (13) Phần include topic. |
| `./www/home/template/vi_VN/space_thread_list.htm` | (30) Danh sách thread. |
| `./www/home/template/vi_VN/space_thread_view.htm` | (34) Xem thread. |
| `./www/home/template/vi_VN/space_tag_list.htm` | (2) Danh sách tag. |
| `./www/home/template/vi_VN/space_tag_view.htm` | (9) Xem tag. |

### 3.7 Bạn bè / Tin nhắn / Thông báo

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_friend.htm` | (59) Trang bạn bè. |
| `./www/home/template/vi_VN/space_wall.htm` | (9) Bảng tin / wall. |
| `./www/home/template/vi_VN/space_notice.htm` | (27) Thông báo. |
| `./www/home/template/vi_VN/space_pm.htm` | (28) Tin nhắn. |
| `./www/home/template/vi_VN/space_privacy.htm` | (15) Trang riêng tư (ví dụ bảo vệ). |
| `./www/home/template/vi_VN/space_info.htm` | (41) Thông tin cá nhân. |

### 3.8 Chia sẻ (share)

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_share_list.htm` | (38) Danh sách chia sẻ. |
| `./www/home/template/vi_VN/space_share_view.htm` | (19) Xem 1 chia sẻ. |
| `./www/home/template/vi_VN/space_share_li.htm` | (6) 1 item chia sẻ. |

### 3.9 Nhóm (mtag)

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_mtag.htm` | (27) Trang nhóm. |
| `./www/home/template/vi_VN/space_mtag_index.htm` | (49) Trang chủ nhóm. |
| `./www/home/template/vi_VN/space_mtag_list.htm` | (19) Danh sách nhóm. |
| `./www/home/template/vi_VN/space_mtag_member.htm` | (25) Thành viên nhóm. |
| `./www/home/template/vi_VN/space_mtag_field.htm` | (15) Trường/thiết lập nhóm. |
| `./www/home/template/vi_VN/space_mtag_event.htm` | (16) Sự kiện nhóm. |
| `./www/home/template/vi_VN/space_mtag_tagname.htm` | (14) Tên tag nhóm. |

### 3.10 Khác (space_*)

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/space_menu.htm` | (3) Menu không gian. |
| `./www/home/template/vi_VN/space_feed_li.htm` | (8) 1 item trong feed. |
| `./www/home/template/vi_VN/space_click.htm` | (2) Click/cảm xúc. |
| `./www/home/template/vi_VN/space_mood.htm` | (7) Tâm trạng. |
| `./www/home/template/vi_VN/space_list.htm` | (6) Danh sách chung. |
| `./www/home/template/vi_VN/space_top.htm` | (33) Bảng xếp hạng. |
| `./www/home/template/vi_VN/space_rss.htm` | (28) RSS. |
| `./www/home/template/vi_VN/space_videophoto.htm` | (4) Video/ảnh. |

---

## Phase 4 — Control Panel (cp_*)

Trang cài đặt / quản lý tài khoản. Có thể chia nhỏ theo từng tab tính năng.

### 4.1 Khung CP & Chung

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/cp_header.htm` | (10) Header CP. |
| `./www/home/template/vi_VN/cp_class.htm` | (10) Menu/class CP. |
| `./www/home/template/vi_VN/cp_space.htm` | (5) Không gian. |
| `./www/home/template/vi_VN/cp_common.htm` | (14) Trang chung. |

### 4.2 Hồ sơ & Bảo mật

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/cp_profile.htm` | (143) Cá nhân / hồ sơ. |
| `./www/home/template/vi_VN/cp_avatar.htm` | (5) Avatar. |
| `./www/home/template/vi_VN/cp_password.htm` | (7) Đổi mật khẩu. |
| `./www/home/template/vi_VN/cp_privacy.htm` | (147) Riêng tư. |
| `./www/home/template/vi_VN/cp_theme.htm` | (19) Giao diện / theme. |

### 4.3 Bạn bè & Mời & Tin nhắn

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/cp_friend.htm` | (162) Bạn bè. |
| `./www/home/template/vi_VN/cp_invite.htm` | (43) Mời. |
| `./www/home/template/vi_VN/cp_poke.htm` | (35) Chào / poke. |
| `./www/home/template/vi_VN/cp_pm.htm` | (13) Tin nhắn. |
| `./www/home/template/vi_VN/cp_sendmail.htm` | (34) Gửi mail / nhắc nhở. |

### 4.4 Nội dung (blog, album, share, doing…)

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/cp_doing.htm` | (7) Ghi chép. |
| `./www/home/template/vi_VN/cp_blog.htm` | (49) Nhật ký. |
| `./www/home/template/vi_VN/cp_album.htm` | (42) Album. |
| `./www/home/template/vi_VN/cp_upload.htm` | (34) Tải lên. |
| `./www/home/template/vi_VN/cp_share.htm` | (19) Chia sẻ. |
| `./www/home/template/vi_VN/cp_feed.htm` | (16) Cấu hình feed. |

### 4.5 Bình chọn, Sự kiện, Chủ đề, Nhóm

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/cp_poll.htm` | (91) Bình chọn. |
| `./www/home/template/vi_VN/cp_event.htm` | (187) Sự kiện. |
| `./www/home/template/vi_VN/cp_event_sheet.htm` | (9) Phiếu sự kiện. |
| `./www/home/template/vi_VN/cp_thread.htm` | (54) Thread. |
| `./www/home/template/vi_VN/cp_topic.htm` | (31) Chủ đề. |
| `./www/home/template/vi_VN/cp_topic_menu.htm` | (5) Menu chủ đề. |
| `./www/home/template/vi_VN/cp_mtag.htm` | (130) Nhóm. |

### 4.6 Điểm, Nhiệm vụ, Đạo cụ, Ứng dụng

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/cp_credit.htm` | (61) Điểm / credit. |
| `./www/home/template/vi_VN/cp_task.htm` | (47) Nhiệm vụ. |
| `./www/home/template/vi_VN/cp_magic.htm` | (71) Đạo cụ. |
| `./www/home/template/vi_VN/cp_click.htm` | (61) Click/cảm xúc. |
| `./www/home/template/vi_VN/cp_userapp.htm` | (27) Ứng dụng. |
| `./www/home/template/vi_VN/cp_comment.htm` | (18) Bình luận. |
| `./www/home/template/vi_VN/cp_videophoto.htm` | (6) Video/ảnh. |

### 4.7 CP khác

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/cp_advance.htm` | (6) Nâng cao. |
| `./www/home/template/vi_VN/cp_domain.htm` | (6) Tên miền. |
| `./www/home/template/vi_VN/cp_import.htm` | (21) Import. |

---

## Phase 5 — Đạo cụ (magic_*)

Dịch từng file một (nhiều file nhỏ).

| File | File | File | File |
|------|------|------|------|
| `./www/home/template/vi_VN/magic_reveal.htm` (5) | `./www/home/template/vi_VN/magic_thunder.htm` (4) | `./www/home/template/vi_VN/magic_bgimage.htm` (13) | `./www/home/template/vi_VN/magic_updateline.htm` (4) |
| `./www/home/template/vi_VN/magic_viewmagiclog.htm` (7) | `./www/home/template/vi_VN/magic_call.htm` (8) | `./www/home/template/vi_VN/magic_gift.htm` (11) | `./www/home/template/vi_VN/magic_invisible.htm` (4) |
| `./www/home/template/vi_VN/magic_anonymous.htm` (4) | `./www/home/template/vi_VN/magic_superstar.htm` (9) | `./www/home/template/vi_VN/magic_flicker.htm` (4) | `./www/home/template/vi_VN/magic_icon.htm` (4) |
| `./www/home/template/vi_VN/magic_attachsize.htm` (4) | `./www/home/template/vi_VN/magic_frame.htm` (9) | `./www/home/template/vi_VN/magic_viewvisitor.htm` (6) | `./www/home/template/vi_VN/magic_visit.htm` (38) |
| `./www/home/template/vi_VN/magic_viewmagic.htm` (6) | `./www/home/template/vi_VN/magic_color.htm` (5) | `./www/home/template/vi_VN/magic_downdateline.htm` (5) | `./www/home/template/vi_VN/magic_hot.htm` (4) |
| `./www/home/template/vi_VN/magic_friendnum.htm` (4) | `./www/home/template/vi_VN/magic_detector.htm` (6) | `./www/home/template/vi_VN/magic_doodle.htm` (5) | |

---

## Phase 6 — Trang phụ & Ứng dụng

| File | Ghi chú |
|------|--------|
| `./www/home/template/vi_VN/network.htm` | (86) Trang “Xem ngẫu nhiên” / network. |
| `./www/home/template/vi_VN/help.htm` | (36) Trợ giúp. |
| `./www/home/template/vi_VN/invite.htm` | (14) Mời (trang độc lập). |
| `./www/home/template/vi_VN/userapp.htm` | (2) Ứng dụng user. |

---

## Gợi ý workflow

1. **Mỗi phase:** Dịch hết nhóm rồi test (refresh, xóa `./www/home/data/tpl_cache/` nếu cần).
2. **Tìm chữ Hán:** Trong thư mục `./www/home/template/vi_VN/`, có thể dùng:
   - `grep -l '[\x{4e00}-\x{9fff}]' *.htm` (hoặc script tương đương) để liệt kê file còn sót.
3. **Thứ tự gợi ý:** Phase 1 → Phase 2 → Phase 3 (từ 3.1 đến 3.10) → Phase 4 (từ 4.1 đến 4.7) → Phase 5 → Phase 6.
4. **File nặng (nhiều chữ Hán):** Ưu tiên trong từng phase: `./www/home/template/vi_VN/cp_friend.htm`, `./www/home/template/vi_VN/cp_event.htm`, `./www/home/template/vi_VN/cp_profile.htm`, `./www/home/template/vi_VN/cp_privacy.htm`, `./www/home/template/vi_VN/cp_mtag.htm`, `./www/home/template/vi_VN/space_event_view.htm`, `./www/home/template/vi_VN/network.htm`, `./www/home/template/vi_VN/space_feed.htm`, `./www/home/template/vi_VN/space_index.htm`.

---

*Cập nhật lần cuối: theo danh sách file trong `./www/home/template/vi_VN/` (chỉ .htm; .css không cần dịch nội dung).*
