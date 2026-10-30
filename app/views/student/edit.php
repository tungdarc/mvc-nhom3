<?php include APP_ROOT . '/app/views/layout/header.php'; ?>

<h3 class="text-center text-uppercase text-success mb-3">Cập nhật sinh viên</h3>

<form action="?controller=editStudent&id=<?= $student->getId() ?>" method="post" style="max-width: 500px; margin: auto;">
    <div class="mb-3">
        <label class="form-label">Mã sinh viên</label>
        <input type="text" class="form-control" name="code" value="<?= $student->getCode() ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Họ tên</label>
        <input type="text" class="form-control" name="name" value="<?= $student->getName() ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Giới tính</label>
        <select class="form-select" name="gender">
            <option value="1" <?= $student->getGender() == 1 ? 'selected' : '' ?>>Nam</option>
            <option value="0" <?= $student->getGender() == 0 ? 'selected' : '' ?>>Nữ</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Ngày sinh</label>
        <input type="date" class="form-control" name="birthday" value="<?= $student->getBirthday() ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $student->getEmail() ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" value="<?= $student->getPhone() ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Trường đại học</label>
        <input type="text" class="form-control" name="university" value="<?= $student->getUniversity() ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Ngành học</label>
        <input type="text" class="form-control" name="major" value="<?= $student->getMajor() ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="address" value="<?= $student->getAddress() ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="btn_update">Cập nhật</button>
    <a href="?controller=home" class="btn btn-secondary">Quay lại</a>
</form>

<?php include APP_ROOT . '/app/views/layout/footer.php'; ?>
