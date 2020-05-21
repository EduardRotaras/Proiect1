<?php
$dbms="mysql";
        $host = 'localhost';
        $db = 'project';
        $user = 'root';
        $pass = '';
        $dsn = "$dbms:host=$host;dbname=$db";
        $con = new PDO($dsn, $user, $pass);
//procedura register user
$sql1 = "DROP PROCEDURE IF EXISTS proceduraImagine ";
$sql2 = "CREATE PROCEDURE proceduraImagine( "
    . "IN strDscription varchar(256), "
    . "IN strPath varchar(128), "
    . "IN strUser varchar(64), "
    . "IN strModel varchar(64)"
    . ") "
    . "BEGIN "
            . "INSERT INTO images(description, path, user, model) VALUES (strDscription, strPath, strUser, strModel);"
    . "END;";
$stmt1 = $con->prepare($sql1);
$stmt2 = $con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();
session_start();
if (isset($_SESSION['user'])) {
    $aux= md5(uniqid(time())) . basename($_FILES['image']['name']);
    $target = "../images/" . $aux;
    //$con = mysqli_connect('localhost', 'root', '', 'project') or die("Failed to connect: " . mysqli_error($con));
    $description = $_POST['description'];
    $user = $_POST['user'];
    $model = $_POST['model'];
    $path= "./images/" . $aux;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        //$sql = "INSERT INTO images(description, path, user, model)VALUES('$description','$path','$user','$model')";
        //mysqli_query($con, $sql);
        $sql = "CALL proceduraImagine('{$description}', '{$path}', '{$user}', '{$model}')";
        $con->query($sql);
        header('location:../' . $model . '.php');
    } else {
        //header('location:../' . $model . '.php');
    }
} else {
    header('location:index.php');
}