
<?php

require_once APP_ROOT . '/app/models/Student.php';

class StudentService
{
    // Chuyển một dòng dữ liệu trong CSDL thành đối tượng Student
    private function makeStudent($row)
    {
        return new Student(
            $row['id'],
            $row['code'],
            $row['name'],
            $row['gender'],
            $row['birthday'],
            $row['email'],
            $row['phone'],
            $row['university'],
            $row['major'],
            $row['address']
        );
    }

    // Lấy danh sách sinh viên hoặc tìm kiếm sinh viên
    public function getAllStudents($keyword = '')
    {
        $students = [];

        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        // Nếu không nhập từ khóa thì lấy tất cả sinh viên
        if ($keyword == '') {
            $sql = "SELECT * FROM students ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } else {
            // Tìm theo mã sinh viên, họ tên, trường hoặc ngành
            $sql = "SELECT * FROM students
                    WHERE code LIKE ?
                    OR name LIKE ?
                    OR university LIKE ?
                    OR major LIKE ?
                    ORDER BY id DESC";

            $stmt = $conn->prepare($sql);

            $searchKeyword = "%$keyword%";

            $stmt->execute([
                $searchKeyword,
                $searchKeyword,
                $searchKeyword,
                $searchKeyword
            ]);
        }

        // Lấy từng dòng dữ liệu và chuyển thành đối tượng Student
        while ($row = $stmt->fetch()) {
            $students[] = $this->makeStudent($row);
        }

        return $students;
    }

    // Lấy thông tin một sinh viên theo ID
    public function getStudentById($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        $row = $stmt->fetch();

        if ($row) {
            return $this->makeStudent($row);
        }

        return null;
    }

    // Thêm sinh viên
    // Trả về true nếu thành công, false nếu xảy ra lỗi
    public function addStudent(Student $student)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        try {
            $sql = "INSERT INTO students
                    (code, name, gender, birthday, email, phone,
                     university, major, address)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                $student->getCode(),
                $student->getName(),
                $student->getGender(),
                $student->getBirthday(),
                $student->getEmail(),
                $student->getPhone(),
                $student->getUniversity(),
                $student->getMajor(),
                $student->getAddress()
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Cập nhật thông tin sinh viên
    // Trả về true nếu thành công, false nếu xảy ra lỗi
    public function updateStudent(Student $student)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        try {
            $sql = "UPDATE students
                    SET code = ?, name = ?, gender = ?, birthday = ?,
                        email = ?, phone = ?, university = ?, major = ?,
                        address = ?
                    WHERE id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                $student->getCode(),
                $student->getName(),
                $student->getGender(),
                $student->getBirthday(),
                $student->getEmail(),
                $student->getPhone(),
                $student->getUniversity(),
                $student->getMajor(),
                $student->getAddress(),
                $student->getId()
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Xóa sinh viên theo ID
    // Trả về true nếu xóa được một dòng, false nếu không xóa được
    public function deleteStudent($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        try {
            $sql = "DELETE FROM students WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
}
