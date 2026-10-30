<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="max-width: 400px;">
        <h3 class="text-center text-uppercase text-success mt-5 mb-3">Đăng ký tài khoản</h3>

        <?php if ($error != '') { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php } ?>
        <?php if ($success != '') { ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php } ?>

        <form action="?controller=register" method="post">
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="full_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu (ít nhất 6 ký tự)</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-success w-100" name="btn_register">Đăng ký</button>
        </form>
        <p class="text-center mt-3">Đã có tài khoản? <a href="?controller=login">Đăng nhập</a></p>
    </div>
</body>

</html>
