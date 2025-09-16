# CTF Seed Users (Lab Only) — Lab Note & README (BurpSuite Observational Lab)

> ⚠️ **Chỉ dùng trong môi trường LAB/SANDBOX bạn sở hữu.** Repo/Plugin này tạo tài khoản yếu để MÔ PHỎNG và QUAN SÁT hành vi đăng nhập (thành công/thất bại), phục vụ MỤC TIÊU GIÁO DỤC: phát hiện & phòng thủ trước brute-force.  
> README **không** cung cấp bước tấn công chi tiết.

---

## 0) Plugin này làm gì?
- Tạo menu: **Tools → CTF Seed Users**.
- Nút **Seed Users**: tạo user từ danh sách `ctf_get_usernames()` nếu chưa tồn tại; mật khẩu chọn ngẫu nhiên từ `ctf_get_passwords()`.
- Nút **Rotate Passwords**: đổi mật khẩu mới (ngẫu nhiên từ danh sách) cho toàn bộ user đã seed (`usermeta ctf_seeded=1`) và ghi **hash** vào `ctf_seeded_password` (chỉ lab).
- Email user được set dạng `username@example.local` (placeholder).

**File/Function chính:**
- `ctf_get_usernames()` và `ctf_get_passwords()` chứa danh sách mẫu (nằm **ngay trong mã plugin**).  
- `ctf_seed_users()` tạo user + đánh dấu `ctf_seeded=1`.
- `ctf_rotate_passwords()` dùng `wp_set_password` để đổi mật khẩu (làm hết phiên đăng nhập hiện tại).

---

## 1) Cài đặt nhanh
1. Tạo thư mục: `wp-content/plugins/ctf-seed-users/`
2. Lưu file: `ctf-seed-users.php` với đúng nội dung mã bạn đã kèm.
3. Vào **Plugins** → Activate **CTF Seed Users (Lab Only)**.
4. Vào **Tools → CTF Seed Users** để thao tác:
   - **Seed Users**: tạo loạt user yếu.
   - **Rotate Passwords**: xoay mật khẩu các user đã seed.

> ✅ Bạn có thể thay/thêm username & password trực tiếp trong 2 hàm `ctf_get_usernames()` và `ctf_get_passwords()`.

---

## 2) Mục tiêu bài lab (với BurpSuite — chỉ QUAN SÁT/PHÒNG THỦ)
**Mục tiêu học tập:**
- Hiểu quy trình xác thực của WordPress và cách plugin seed/rotate hoạt động.
- **QUAN SÁT** hành vi HTTP khi đăng nhập đúng/sai (không brute-force hàng loạt).
- Xác định tín hiệu nghi vấn trong **web server logs** và **WordPress debug log**.
- Thiết lập & kiểm thử **biện pháp phòng thủ** (rate-limit, lockout, CAPTCHA, fail2ban).
- Viết **alert/rule SIEM** để phát hiện pattern đáng ngờ (tần suất thất bại, nhiều username/1 IP, v.v.).

> ℹ️ README **không** hướng dẫn cấu hình tấn công hàng loạt bằng Burp Intruder. Toàn bộ phần về BurpSuite chỉ mang tính quan sát/phân tích response để phục vụ **phòng thủ**.

---

## 3) Kịch bản quan sát với BurpSuite (an toàn)
1. **Proxy trình duyệt qua Burp** (HTTP/HTTPS).
2. Mở `/wp-login.php`, thực hiện một vài **đăng nhập THỦ CÔNG**:
   - 1–2 lần **đúng** (với 1 user được seed): xác nhận luồng redirect hậu đăng nhập.
   - 3–5 lần **sai** (username tồn tại nhưng sai mật khẩu): ghi nhận response server.
3. Trong Burp:
   - Ghi chú **Request/Response** khác biệt giữa thành công và thất bại (mẫu status code, header, thông điệp lỗi, redirect).
   - Không lặp hàng loạt — chỉ cần đủ mẫu để **thiết kế detection**.
4. Đối chiếu **log web server** (nginx/apache) và (nếu bật) `wp-content/debug.log`:
   - Ghi `IP, UA, URL, status code, thời gian, số lần thử trong khoảng T`.
5. **Thiết lập phòng thủ** rồi lặp lại bước 2–4 để kiểm chứng hiệu quả.

> Gợi ý quan sát: status 200/302, thông điệp lỗi WP, chuỗi Location header, thời lượng phản hồi, cookies/nonce.

---

## 4) Nhật ký & vị trí log (tham khảo)
- **Nginx**: `/var/log/nginx/access.log`, `/var/log/nginx/error.log`
- **Apache**: `/var/log/apache2/access.log`, `/var/log/apache2/error.log`
- **WordPress debug** (dev only):
  - `wp-config.php` bật:
    ```php
    define('WP_DEBUG', true);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);
    ```
  - Xem: `wp-content/debug.log`

---

## 5) Phòng thủ gợi ý
- **Limit Login / Lockout**: plugin kiểu *Limit Login Attempts Redux*, *WP Limit Login Attempts*, v.v.
- **Rate limiting** ở reverse proxy (nginx `limit_req`).
- **CAPTCHA** tại form login.
- **fail2ban**: rule dựa trên access.log — block IP khi vượt ngưỡng thử sai.
- **Mật khẩu mạnh + 2FA** cho admin/biên tập.
- **Ẩn/đổi đường dẫn** trang đăng nhập (nếu chính sách cho phép).

---

## 6) Mẫu ý tưởng rule phát hiện (SIEM — chỉ gợi ý, tuỳ hệ thống)
- **Pattern 1:** >5 lần thất bại với **cùng username** trong 5 phút.
- **Pattern 2:** >10 lần thất bại từ **cùng một IP** tới **>5 username khác nhau** trong 10 phút.
- **Pattern 3:** Lượng request tới `/wp-login.php` tăng đột biến so với baseline.

> Bạn có thể triển khai trên Splunk/ELK/Grafana tuỳ dữ liệu. Nếu cần, mình có thể soạn **mẫu truy vấn** phù hợp với log của bạn.

---

## 7) Tuỳ biến danh sách user/password
- Mở file `ctf-seed-users.php` → sửa nội dung giữa các block `<<<'USERNAMES' ... USERNAMES` và `<<<'PASSWORDS' ... PASSWORDS`.
- Mỗi giá trị 1 dòng, plugin sẽ `trim` và dùng trực tiếp.
- **Lưu ý**: Danh sách hiện tại có nhiều giá trị **rất yếu** — GIỮ CHỈ TRONG LAB.

---

## 8) Dọn dẹp sau lab
- Xoá hoặc vô hiệu plugin.
- (Tuỳ chọn) Viết/khôi phục `register_uninstall_hook` để remove user đã seed (đoạn mã đã được comment sẵn trong file, xem cuối file plugin).
- Xoá cấu hình phòng thủ tạm (nếu không còn mục đích test).

---

## 9) Câu hỏi thường gặp
**Q:** Có thể xem mật khẩu hiện tại của các user đã seed không?  
**A:** Plugin **không** lưu plaintext, chỉ lưu **hash** trong `ctf_seeded_password` *để nhắc tính nhạy cảm*. Trong lab, bạn có thể dùng **Rotate Passwords** để tạo mật khẩu mới rồi ghi chú thủ công ngoài hệ thống (không khuyến khích plaintext).

**Q:** Có được phép test brute-force thật không?  
**A:** Chỉ khi **bạn sở hữu môi trường** và **chính sách nội bộ cho phép**. README này không hướng dẫn hành vi đó. Mục tiêu là **quan sát & phòng thủ**.

---

## 10) Ghi công
- **Tác giả plugin**: HuyQA (Template)  
- Giấy phép: GPL-2.0

