<?php include APP_ROOT . '/app/views/layout/header.php'; ?>

<h3 class="text-center text-uppercase text-danger mb-3">Xoá sinh viên</h3>

<form action="?controller=deleteStudent&id=<?= $student->getId() ?>" method="post" style="max-width: 500px; margin: auto;">
    <div class="mb-3">
        <label class="form-label">Mã sinh viên</label>
        <input type="text" class="form-control" value="<?= $student->getCode() ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Họ tên</label>
        <input type="text" class="form-control" value="<?= $student->getName() ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Trường đại học</label>
        <input type="text" class="form-control" value="<?= $student->getUniversity() ?>" readonly>
    </div>

    <button type="submit" class="btn btn-danger" name="btn_delete">Xác nhận xoá</button>
    <a href="?controller=home" class="btn btn-secondary">Quay lại</a>
</form>

<?php include APP_ROOT . '/app/views/layout/footer.php'; ?>
