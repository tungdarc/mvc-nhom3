<?php

session_start();   // bắt buộc có để dùng $_SESSION (đăng nhập)

require_once('../app/config/config.php');
require_once APP_ROOT . '/app/libs/DBConnection.php';
require_once APP_ROOT . '/app/controllers/UserController.php';
require_once APP_ROOT . '/app/controllers/HomeController.php';
require_once APP_ROOT . '/app/controllers/StudentController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$userController = new UserController();
$homeController = new HomeController();
$studentController = new StudentController();

// ----- Đăng nhập / Đăng ký / Đăng xuất (không cần đăng nhập) -----
if ($controller == 'login') {
    $userController->login();
} else if ($controller == 'register') {
    $userController->register();
} else if ($controller == 'logout') {
    $userController->logout();
}
// ----- Chưa đăng nhập thì chuyển về trang đăng nhập -----
else if (!isset($_SESSION['user'])) {
    header('Location: ?controller=login');
}
// ----- Các chức năng cần đăng nhập -----
else if ($controller == 'home') {
    $homeController->index();
} else if (isset($_POST['btn_create'])) {
    $studentController->store();
} else if ($controller == 'addStudent') {
    $studentController->add();
} else if ($controller == 'detailStudent') {
    $studentController->detail($id);
} else if (isset($_POST['btn_update'])) {
    $studentController->update($id);
} else if ($controller == 'editStudent') {
    $studentController->edit($id);
} else if (isset($_POST['btn_delete'])) {
    $studentController->destroy($id);
} else if ($controller == 'deleteStudent') {
    $studentController->delete($id);
}
