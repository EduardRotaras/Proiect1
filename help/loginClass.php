<?php

class loginClass {

    function __construct() {
        $dbms="mysql";
        $host = 'localhost';
        $db = 'project';
        $user = 'root';
        $pass = '';
        $dsn = "$dbms:host=$host;dbname=$db";
        $con = new PDO($dsn, $user, $pass);
        // delete trigger
        $sql1 = "DROP TRIGGER IF EXISTS delete_trigger";
        $sql2 = "CREATE TRIGGER delete_trigger BEFORE DELETE ON images "
                    . "FOR EACH ROW BEGIN INSERT INTO logs(event, user, timestamp) "
                    . "VALUES ('DELETE', OLD.user, NOW()); "
                    . "END;";
        $stmt1 = $con->prepare($sql1);
        $stmt2 = $con->prepare($sql2);
        $stmt1->execute();
        $stmt2->execute();
        //insert trigger
        $sql11 = "DROP TRIGGER IF EXISTS insert_trigger";
        $sql21 = "CREATE TRIGGER insert_trigger AFTER INSERT ON images "
                    . "FOR EACH ROW BEGIN INSERT INTO logs(event, user, timestamp) "
                    . "VALUES ('INSERT', NEW.user, NOW()); "
                    . "END;";
        $stmt11 = $con->prepare($sql11);
        $stmt21= $con->prepare($sql21);
        $stmt11->execute();
        $stmt21->execute();
        
        //register trigger
        $sql12 = "DROP TRIGGER IF EXISTS register_trigger";
        $sql22 = "CREATE TRIGGER register_trigger AFTER INSERT ON users "
                    . "FOR EACH ROW BEGIN INSERT INTO logs(event, user, timestamp) "
                    . "VALUES ('REGISTER', NEW.nume, NOW()); "
                    . "END;";
        $stmt12 = $con->prepare($sql12);
        $stmt22= $con->prepare($sql22);
        $stmt12->execute();
        $stmt22->execute();
        
        //procedura select users
        $sql13 = "DROP PROCEDURE IF EXISTS proceduraUseri ";
        $sql23 = "CREATE PROCEDURE proceduraUseri( "
            . "IN strNume varchar(64), "
            . "IN strParola varchar(64)"
            . ") "
            . "BEGIN "
                . "SELECT * FROM users WHERE nume = strNume and parola = strParola;"
            . "END;";
        $stmt13 = $con->prepare($sql13);
        $stmt23 = $con->prepare($sql23);
        $stmt13->execute();
        $stmt23->execute();
        
        //procedura register user
        $sql14 = "DROP PROCEDURE IF EXISTS proceduraRegister ";
        $sql24 = "CREATE PROCEDURE proceduraRegister( "
            . "IN strNume varchar(64), "
            . "IN strParola varchar(64)"
            . ") "
            . "BEGIN "
                . "INSERT INTO users(nume, parola, admin)VALUES(strNume, strParola, '1');"
            . "END;";
        $stmt14 = $con->prepare($sql14);
        $stmt24 = $con->prepare($sql24);
        $stmt14->execute();
        $stmt24->execute();
    }

    function validate($nickname, $password) {
        $dbms="mysql";
        $host = 'localhost';
        $db = 'project';
        $user = 'root';
        $pass = '';
        $dsn = "$dbms:host=$host;dbname=$db";
        $con = new PDO($dsn, $user, $pass);
        $sql = "CALL proceduraUseri('{$nickname}', '{$password}')";//"SELECT * FROM users WHERE nume='".$nickname."' and parola='".$password."';";
        //$query = mysqli_query($con, $sql) or die(mysqli_error($con));
        $querry = $con->query($sql);
        $querry->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $querry->fetch()){
            return $row['admin'];
        }
        return 0;
    }
    function register($nickname, $password){
        //$sql = "INSERT INTO users(nume, parola, admin)VALUES('$nickname','$password', '1');";
        //mysqli_query($con, $sql);
        $dbms="mysql";
        $host = 'localhost';
        $db = 'project';
        $user = 'root';
        $pass = '';
        $dsn = "$dbms:host=$host;dbname=$db";
        $con = new PDO($dsn, $user, $pass);
        $sql = "CALL proceduraRegister('{$nickname}', '{$password}')";
        $con->query($sql);
        return 1;
    }

}
