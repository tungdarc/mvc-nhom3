<?php

require_once APP_ROOT . '/app/services/UserService.php';

class UserController
{
    // ĐĂNG NHẬP
    public function login()
    {
        $error = '';

        if (isset($_POST['btn_login'])) {
            $userService = new UserService();
            $user = $userService->login(trim($_POST['username']), $_POST['password']);

            if ($user != null) {
                $_SESSION['user'] = $user['full_name'];   // có session = đã đăng nhập
                header('Location: ?controller=home');
                exit;
            }
            $error = 'Sai tên đăng nhập hoặc mật khẩu';
        }

        include APP_ROOT . '/app/views/user/login.php';
    }

    // ĐĂNG KÝ
    public function register()
    {
        $error = '';
        $success = '';

        if (isset($_POST['btn_register'])) {
            $username = trim($_POST['username']);
            $fullName = trim($_POST['full_name']);
            $password = $_POST['password'];
            $confirm = $_POST['confirm_password'];

            if ($password != $confirm) {
                $error = 'Mật khẩu nhập lại không khớp';
            } else if (strlen($password) < 6) {
                $error = 'Mật khẩu phải có ít nhất 6 ký tự';
            } else {
                $userService = new UserService();
                if ($userService->register($username, $fullName, $password)) {
                    $success = 'Đăng ký thành công! Hãy đăng nhập.';
                } else {
                    $error = 'Tên đăng nhập đã tồn tại';
                }
            }
        }

        include APP_ROOT . '/app/views/user/register.php';
    }

    // ĐĂNG XUẤT
    public function logout()
    {
        session_destroy();
        header('Location: ?controller=login');
    }
}
