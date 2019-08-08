<?php

function InsertRecord($firdtname, $lastname, $email) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "IT_QAN";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("INSERT INTO Student (firstname, lastname, email) VALUES (?,?,?)");
        $sql ->execute(array($firdtname, $lastname, $email));
        // use exec() because no results are returned
 
        echo "New record created successfully";
        }
    catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;
    }
?> 