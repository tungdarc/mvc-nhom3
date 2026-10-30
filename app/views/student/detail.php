<?php include APP_ROOT . '/app/views/layout/header.php'; ?>

<h3 class="text-center text-uppercase text-success mb-3">Chi tiết sinh viên</h3>

<table class="table table-bordered" style="max-width: 600px; margin: auto;">
    <tr><th width="35%">Mã sinh viên</th><td><?= $student->getCode() ?></td></tr>
    <tr><th>Họ tên</th><td><?= $student->getName() ?></td></tr>
    <tr><th>Giới tính</th><td><?= $student->getGenderText() ?></td></tr>
    <tr><th>Ngày sinh</th><td><?= $student->getBirthday() ?></td></tr>
    <tr><th>Email</th><td><?= $student->getEmail() ?></td></tr>
    <tr><th>Số điện thoại</th><td><?= $student->getPhone() ?></td></tr>
    <tr><th>Trường đại học</th><td><?= $student->getUniversity() ?></td></tr>
    <tr><th>Ngành học</th><td><?= $student->getMajor() ?></td></tr>
    <tr><th>Địa chỉ</th><td><?= $student->getAddress() ?></td></tr>
</table>

<div class="text-center mt-3">
    <a href="?controller=editStudent&id=<?= $student->getId() ?>" class="btn btn-primary">Sửa</a>
    <a href="?controller=home" class="btn btn-secondary">Quay lại</a>
</div>

<?php include APP_ROOT . '/app/views/layout/footer.php'; ?>
