<?php
require '../php/user.php';


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

if (isset($_POST['delete'])) {
    // var_dump($_POST);
    // die;
    $user = new Login();
    $user->id = $_POST['task-id'];
    $user->delete();
    header('location: dashboard.php');
}
