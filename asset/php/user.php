<?php
require 'database.php';
session_start();


class Login extends Connection
{
    public $id;
    public $email;
    public $password;
    public $title;
    public $artist;
    public $lyrics;
    public $date;
    public $album;

    function __construct($email = null, $password = null, $id = null, $title = null, $artist = null, $lyrics = null, $date = null, $album = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->title = $title;
        $this->artist = $artist;
        $this->lyrics = $lyrics;
        $this->date =  $date;
        $this->date =  $album;
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

    public function Savesong()
    {
        $sql = "INSERT INTO `song`(`title`, `artist`, `lyrics`, `date`, `album`) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->title, $this->artist, $this->lyrics, $this->date, $this->album]);
        if ($stmt) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = 'Noice';
            header('location: dashboard.php');
        } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = 'Somthing went wrong !';
        }
    }


    public function Read()
    {
        $sql = "SELECT * FROM `song`";
        $stmt = $this->connect()->query($sql);
        while ($result = $stmt->fetch()) {
            echo '
            <tr>
                <td id="songg' . $result['id'] . '" data="' . $result['title'] . '" class="text-white" href="#modal-task" data-bs-toggle="modal" onclick="editdTask(' . $result['id'] . ')" class="text-decoration-none text-white">' . $result['title'] . '</td>
                <td id="artistt' . $result['id'] . '" data="' . $result['artist'] . '" class="text-white">' . $result['artist'] . '</td>
                <td id="lyricss' . $result['id'] . '" data="' . $result['lyrics'] . '" class="text-white text-truncate">' . $result['lyrics'] . '</td>
                <td id="datee' . $result['id'] . '" data="' . $result['date'] . '" class="text-white">' . $result['date'] . '</td>
                <td id="albumm' . $result['id'] . '" data="' . $result['album'] . '" class="text-white">' . $result['album'] . '</td>
            </tr>
            ';
        }
        // return $result;
    }

    public function updatee($id, $title, $artist, $lyrics, $date, $album)
    {
        $sql = "UPDATE `song` SET `title`= '$title',`artist`= '$artist',`lyrics`= '$lyrics',`date`= '$date',`album`= '$album' WHERE id = '$id'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();

        return $result;
    }
}
if (isset($_POST['login'])) {
    $user = new Login($_POST['email'], $_POST['password']);
    $user->login();
}

if (isset($_POST['save'])) {
    $user = new Login;
    $user->title = $_POST['title'];
    $user->artist = $_POST['name'];
    $user->date = $_POST['date'];
    $user->lyrics = $_POST['Lyrics'];
    $user->album = $_POST['album'];
    $user->Savesong();
}

if (isset($_POST['update'])) {
    $id = $_POST['task-id'];
    $title = $_POST['title'];
    $artist = $_POST['name'];
    $lyrics = $_POST['Lyrics'];
    $date = $_POST['date'];
    $album = $_POST['album'];
    $user = new Login();
    $test = $user->Updatee($id, $title, $artist, $lyrics, $date, $album);

    if ($test) {
        echo '<script>alert("oui")</script>';
        header('location: dashboard.php');
    } else {
        echo '<script>alert("no")</script>';
        header('location: dashboard.php');
    }
}
