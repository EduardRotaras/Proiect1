<?php

class imagesClass {

    function getImageType($name = false) {
        $con = mysqli_connect('localhost', 'root', '', 'project') or die("Failed to connect: " . mysqli_error($con));
        $sql = '';
        if ($name) {
            $sql = "SELECT * FROM images WHERE `model` LIKE '$name';";
        } else {
            $sql = "SELECT * FROM images;";
        }
        $query = mysqli_query($con, $sql) or die(mysqli_error($con));
        return $query;
    }

}
