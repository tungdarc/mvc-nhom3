<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Thanh menu dùng chung cho các trang -->
    <nav class="navbar navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="?controller=home">Quản lý sinh viên</a>
            <div>
                <span class="navbar-text me-3">Xin chào, <?= $_SESSION['user'] ?></span>
                <a class="btn btn-outline-light btn-sm" href="?controller=logout">Đăng xuất</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
