<?php include APP_ROOT . '/app/views/layout/header.php'; ?>

<h3 class="text-center text-uppercase text-success mb-3">Danh sách sinh viên</h3>

<!-- Form TÌM KIẾM: gửi bằng GET nên từ khoá hiện trên thanh địa chỉ -->
<form method="get" action="" class="row g-2 mb-3">
    <input type="hidden" name="controller" value="home">
    <div class="col-md-8">
        <input type="text" name="keyword" class="form-control"
               placeholder="Tìm theo mã SV, họ tên, trường, ngành..." value="<?= $keyword ?>">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        <a href="?controller=home" class="btn btn-secondary">Xoá lọc</a>
        <a href="?controller=addStudent" class="btn btn-success">Thêm sinh viên</a>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Trường đại học</th>
            <th>Ngành</th>
            <th>Chi tiết</th>
            <th>Sửa</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($students)) {
            foreach ($students as $student) {
        ?>
                <tr>
                    <td><?= $student->getCode() ?></td>
                    <td><?= $student->getName() ?></td>
                    <td><?= $student->getGenderText() ?></td>
                    <td><?= $student->getUniversity() ?></td>
                    <td><?= $student->getMajor() ?></td>
                    <td><a href="?controller=detailStudent&id=<?= $student->getId() ?>">Xem</a></td>
                    <td><a href="?controller=editStudent&id=<?= $student->getId() ?>">Sửa</a></td>
                    <td><a href="?controller=deleteStudent&id=<?= $student->getId() ?>">Xoá</a></td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="8" class="text-center">Không tìm thấy sinh viên nào</td></tr>';
        }
        ?>
    </tbody>
</table>
<p>Tìm thấy: <b><?= count($students) ?></b> sinh viên</p>

<?php include APP_ROOT . '/app/views/layout/footer.php'; ?>
