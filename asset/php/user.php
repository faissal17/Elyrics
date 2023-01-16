<?php
require 'database.php';
session_start();

$user = new signup();
$user->regstration();

class signup extends Connection
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $phone;
    public $age;


    function __construct($email = null, $password = null, $first_name = null, $last_name = null, $phone = null, $age = null, $id = null)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
        $this->phone = $phone;
    }


    public function regstration()
    {
        $sql = "SELECT * FROM `signup` WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->email]);
        $result = $stmt->fetch();
        if ($result['id'] == '') {
            $insert = "INSERT INTO `signup`(first_name,last_name,email,password) VALUES (?,?,?,?)";
            $stmt = $this->connect()->prepare($insert);
            $stmt->execute([$this->first_name, $this->last_name, $this->email, $this->password]);
            header('location:../login.php');
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Registration has been added successfully!";
        } else {
            header('location:../signup.php');
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Email already exists!!";
        }
    }

    public function login()
    {
        $sql = "SELECT * FROM `signup` WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->email]);
        $result = $stmt->fetch();
        if (!isset($result['password'])) {
            header('location:../login.php');
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Email incorrect";
        } else {
            $res = password_verify($this->password, $result['password']);
            if ($res) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['first_name'] = $result['first_name'];
                $_SESSION['last_name'] = $result['last_name'];
                $_SESSION['age'] = $result['age'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['phone'] = $result['phone'];
                header('location:../index.php');
            } else {
                header('location:../login.php');
                $_SESSION['type_message'] = "error";
                $_SESSION['message'] = 'Password incorrect';
            }
        }
    }
}
