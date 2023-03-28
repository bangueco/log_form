<?php

$connect = new PDO("mysql:host=localhost;dbname=e_logs", 'admin', 'admin');

$__firstname = $_POST['first_name'];
$__middlename = $_POST['middle_name'];
$__lastname = $_POST['last_name'];

if (empty($__middlename) == true) {
    $stmt = $connect->prepare("INSERT INTO logs (first_name, last_name) VALUES (:__firstname, :__lastname)");
    $stmt->bindParam(':__firstname', $__firstname);
    $stmt->bindParam(':__lastname', $__lastname);
    $stmt->execute();
} else {
    $stmt = $connect->prepare("INSERT INTO logs (first_name, middle_name, last_name) VALUES (:__firstname, :__middlename, :__lastname)");
    $stmt->bindParam(':__firstname', $__firstname);
    $stmt->bindParam(':__middlename', $__middlename);
    $stmt->bindParam(':__lastname', $__lastname);
    $stmt->execute();
}

header("location: ../../index.php");