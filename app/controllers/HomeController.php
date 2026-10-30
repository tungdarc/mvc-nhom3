<?php

require_once APP_ROOT . '/app/services/StudentService.php';

// Trang chủ = danh sách sinh viên + tìm kiếm
class HomeController
{
    public function index()
    {
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        $studentService = new StudentService();
        $students = $studentService->getAllStudents($keyword);

        include APP_ROOT . '/app/views/home/index.php';
    }
}
