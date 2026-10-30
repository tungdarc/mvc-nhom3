<?php include APP_ROOT . '/app/views/layout/header.php'; ?>

<h3 class="text-center text-uppercase text-success mb-3">Thêm sinh viên</h3>

<form action="?controller=addStudent" method="post" style="max-width: 500px; margin: auto;">
    <div class="mb-3">
        <label class="form-label">Mã sinh viên</label>
        <input type="text" class="form-control" name="code" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Họ tên</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Giới tính</label>
        <select class="form-select" name="gender">
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Ngày sinh</label>
        <input type="date" class="form-control" name="birthday">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" name="phone">
    </div>
    <div class="mb-3">
        <label class="form-label">Trường đại học</label>
        <input type="text" class="form-control" name="university" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Ngành học</label>
        <input type="text" class="form-control" name="major">
    </div>
    <div class="mb-3">
        <label class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="address">
    </div>

    <button type="submit" class="btn btn-primary" name="btn_create">Thêm</button>
    <a href="?controller=home" class="btn btn-secondary">Quay lại</a>
</form>

<?php include APP_ROOT . '/app/views/layout/footer.php'; ?>
