<?php
    ob_start();
    session_start();

    include 'config.php';

    $dsn='mysql:host=localhost;port=8080;dbname=zatech';
    $user='root';
    $pass='';
    $option=array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    try {
        $con = new PDO($dsn,$user,$pass,$option);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Failed To Connect" . $e->getMessage();
    }

    ob_end_flush();
?>