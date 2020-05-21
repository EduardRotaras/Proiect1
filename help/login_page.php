<?php

session_start();
if (isset($_POST['nickname']) && isset($_POST['password'])) {
    if ($_POST['captcha'] != $_POST['vcapt']) {
        header('Location: http://localhost/Project/login.php');
    } else {
        require_once 'loginClass.php';
        $lgn = new loginClass();
        $ok = $lgn->validate($_POST['nickname'], $_POST['password']);
        if ($ok > 0) {
            $_SESSION['user'] = $_POST['nickname'];
            $_SESSION['admin'] = $ok;
            if (isset($_POST['remember'])) {
                setcookie("nickname", $_POST['nickname'], 60 * 60 * 24 * 365);
                setcookie("password", $_POST['password'], 60 * 60 * 24 * 365);
            } else {
                setcookie("nickname", $_POST['nickname'], false);
                setcookie("password", $_POST['password'], false);
            }
            header('Location: http://localhost/Project/index.php');
        } else {
            header('Location: http://localhost/Project/login.php');
        }
    }
} else {
    header('Location: http://localhost/Project/login.php');
}

