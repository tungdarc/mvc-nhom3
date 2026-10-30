<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="max-width: 400px;">
        <h3 class="text-center text-uppercase text-success mt-5 mb-3">Đăng nhập</h3>

        <?php if ($error != '') { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php } ?>

        <form action="?controller=login" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-success w-100" name="btn_login">Đăng nhập</button>
        </form>
        <p class="text-center mt-3">Chưa có tài khoản? <a href="?controller=register">Đăng ký</a></p>
    </div>
</body>

</html>
