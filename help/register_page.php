<?php
session_start();
if(isset($_POST['nickname'])&&isset($_POST['password'])){
    require_once 'loginClass.php';
    $lgn = new loginClass();
    $ok = $lgn->register($_POST['nickname'], $_POST['password']);
    if($ok>0){
        $_SESSION['user'] = $_POST['nickname'];
        $_SESSION['admin'] = $ok;
        header('Location: http://localhost/Project/index.php');
    }
    else{
        header('Location: http://localhost/Project/login.php');
    }
}


