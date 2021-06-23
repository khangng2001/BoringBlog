<?php 
    $host='localhost';
    $user='root';
    $password='';
    $db_name='blog';

    $conn=new mysqli($host,$user,$password,$db_name);
     if ($conn -> connect_error) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }
?>