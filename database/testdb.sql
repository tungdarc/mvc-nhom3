-- Cách chạy: phpMyAdmin -> New -> tạo database "testdb" (utf8mb4_unicode_ci)
-- -> chọn testdb -> tab SQL -> dán toàn bộ file này -> Thực hiện

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL UNIQUE,   -- mã sinh viên
    name VARCHAR(100) NOT NULL,         -- họ tên
    gender TINYINT NOT NULL DEFAULT 1,  -- 1 = Nam, 0 = Nữ
    birthday DATE NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    university VARCHAR(150),            -- trường đại học đang theo học
    major VARCHAR(100),                 -- ngành học
    address VARCHAR(255)
);

-- Tài khoản mẫu: admin / admin123
INSERT INTO users (username, password, full_name) VALUES
('admin', '$2y$10$93rewH2Ue7WhxYxXcCSG3.cHumhyqY4yHlzdRGwfzFlGqd7lsB5OO', 'Quản trị viên');

INSERT INTO students (code, name, gender, birthday, email, phone, university, major, address) VALUES
('SV001', 'Nguyễn Minh Anh', 0, '2004-03-15', 'anh@mail.com', '0901111111', 'Đại học Bách khoa Hà Nội', 'Công nghệ thông tin', 'Hà Nội'),
('SV002', 'Trần Quốc Bảo', 1, '2003-07-21', 'bao@mail.com', '0902222222', 'Đại học Kinh tế Quốc dân', 'Quản trị kinh doanh', 'Hải Phòng'),
('SV003', 'Lê Thu Hà', 0, '2004-11-02', 'ha@mail.com', '0903333333', 'Đại học Bách khoa Hà Nội', 'Điện tử viễn thông', 'Nam Định'),
('SV004', 'Phạm Đức Huy', 1, '2002-01-30', 'huy@mail.com', '0904444444', 'Đại học Quốc gia Hà Nội', 'Vật lý', 'Thanh Hóa');
