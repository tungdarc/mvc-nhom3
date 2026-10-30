<?php

require_once APP_ROOT . '/app/services/StudentService.php';

class StudentController
{
    // Hiện form thêm
    public function add()
    {
        include_once APP_ROOT . '/app/views/student/add.php';
    }

    // Nhận dữ liệu từ form thêm và lưu vào CSDL
    public function store()
    {
        $birthday = $_POST['birthday'] == '' ? null : $_POST['birthday'];

        $student = new Student(null, trim($_POST['code']), trim($_POST['name']), $_POST['gender'],
            $birthday, trim($_POST['email']), trim($_POST['phone']),
            trim($_POST['university']), trim($_POST['major']), trim($_POST['address']));

        $studentService = new StudentService();
        if ($studentService->addStudent($student)) {
            header('Location: ?controller=home');
        } else {
            echo 'Mã sinh viên đã tồn tại! <a href="?controller=addStudent">Quay lại</a>';
        }
    }

    // XEM CHI TIẾT
    public function detail($id)
    {
        if (isset($id)) {
            $studentService = new StudentService();
            $student = $studentService->getStudentById($id);

            if ($student == null) {
                echo 'Không tìm thấy sinh viên';
                return;
            }
            include APP_ROOT . '/app/views/student/detail.php';
        } else {
            echo 'Id is null';
        }
    }

    // Hiện form sửa
    public function edit($id)
    {
        if (isset($id)) {
            $studentService = new StudentService();
            $student = $studentService->getStudentById($id);

            if ($student == null) {
                echo 'Không tìm thấy sinh viên';
                return;
            }
            include APP_ROOT . '/app/views/student/edit.php';
        } else {
            echo 'Id is null';
        }
    }

    // Nhận dữ liệu từ form sửa và cập nhật
    public function update($id)
    {
        $birthday = $_POST['birthday'] == '' ? null : $_POST['birthday'];

        $student_new = new Student($id, trim($_POST['code']), trim($_POST['name']), $_POST['gender'],
            $birthday, trim($_POST['email']), trim($_POST['phone']),
            trim($_POST['university']), trim($_POST['major']), trim($_POST['address']));

        $studentService = new StudentService();
        if ($studentService->updateStudent($student_new)) {
            header('Location: ?controller=home');
        } else {
            echo 'Mã sinh viên đã tồn tại! <a href="?controller=editStudent&id=' . $id . '">Quay lại</a>';
        }
    }

    // Hiện trang xác nhận xoá
    public function delete($id)
    {
        if (isset($id)) {
            $studentService = new StudentService();
            $student = $studentService->getStudentById($id);

            if ($student == null) {
                echo 'Không tìm thấy sinh viên';
                return;
            }
            include APP_ROOT . '/app/views/student/delete.php';
        } else {
            echo 'Id is null';
        }
    }

    // Xoá thật sự
    public function destroy($id)
    {
        $studentService = new StudentService();
        $studentService->deleteStudent($id);
        header('Location: ?controller=home');
    }
}
