<?php

session_start();
if (isset($_SESSION['user'])) {
    $model = $_GET['model'];
    $con = mysqli_connect('localhost', 'root', '', 'project') or die("Failed to connect: " . mysqli_error($con));
    if (isset($_GET['id'])) {
        $sql = "DELETE FROM images WHERE id='" . $_GET['id'] . "'";
    }
    mysqli_query($con, $sql) or die(mysqli_error($con));
    header('location:../' . $model . '.php');
} else
    header("Location:index.php");

