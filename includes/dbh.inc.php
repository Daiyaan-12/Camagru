<?php

$servername = "localhost";
$dbusername = "root";
$dbpasswors = "Cucumber123";
$dbname = "camagru";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",'root','Cucumber123');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch (PDOException $e)
{
    die("Connection failed");
}
?>