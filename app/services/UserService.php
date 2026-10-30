
<?php

class UserService
{
    // ĐĂNG NHẬP
    // Thành công: trả về thông tin user
    // Thất bại: trả về null
    public function login($username, $password)
    {
        // Kết nối cơ sở dữ liệu
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        // Tìm tài khoản theo tên đăng nhập
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        // Lấy thông tin tài khoản
        $user = $stmt->fetch();

        // Kiểm tra tài khoản và mật khẩu
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        // Tài khoản không tồn tại hoặc mật khẩu không đúng
        return null;
    }

    // ĐĂNG KÝ
    // Thành công: trả về true
    // Thất bại: trả về false
    public function register($username, $fullName, $password)
    {
        // Kết nối cơ sở dữ liệu
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        // Mã hóa mật khẩu trước khi lưu vào CSDL
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Thêm tài khoản mới vào bảng users
            $sql = "INSERT INTO users (username, password, full_name)
                    VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                $username,
                $hashedPassword,
                $fullName
            ]);

            return true;

        } catch (PDOException $e) {
            // Đăng ký thất bại do lỗi cơ sở dữ liệu
            return false;
        }
    }
}
