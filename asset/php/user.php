<?php
require 'database.php';
session_start();


class Login extends Connection
{
    public $id;
    public $email;
    public $password;

    function __construct($email = null, $password = null, $id = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }


    public function login()
    {
        $sql = "SELECT * FROM `login` WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->email]);
        $result = $stmt->fetch();
        // var_dump($result);  
        // die;
        if (!isset($result["password"])) {
            // die("hhh");
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Email incorrect";
            header('location: login.php');
        } else {
            $res = password_verify($this->password, $result["password"]);
            // $res = ($this->password == $result["password"]);
            if ($res) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['password'] = $result['password'];
                header('location: dashboard.php');
            } else {
                $_SESSION['type_message'] = "error";
                $_SESSION['message'] = 'Password incorrect';
                header('location: login.php');
            }
        }
    }
}
if (isset($_POST['login'])) {
    $user = new Login($_POST['email'], $_POST['password']);
    $user->login();
}
