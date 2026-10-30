<?php

class Student
{
    private $id;
    private $code;
    private $name;
    private $gender;      // 1 = Nam, 0 = Nữ
    private $birthday;
    private $email;
    private $phone;
    private $university;
    private $major;
    private $address;

    public function __construct($id, $code, $name, $gender, $birthday, $email, $phone, $university, $major, $address)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->email = $email;
        $this->phone = $phone;
        $this->university = $university;
        $this->major = $major;
        $this->address = $address;
    }

    public function getId() { return $this->id; }
    public function getCode() { return $this->code; }
    public function getName() { return $this->name; }
    public function getGender() { return $this->gender; }
    public function getBirthday() { return $this->birthday; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getUniversity() { return $this->university; }
    public function getMajor() { return $this->major; }
    public function getAddress() { return $this->address; }

    // Đổi 1/0 thành chữ để hiển thị
    public function getGenderText()
    {
        return $this->gender == 1 ? 'Nam' : 'Nữ';
    }
}
