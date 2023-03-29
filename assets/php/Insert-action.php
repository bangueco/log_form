<?php

$connect = new PDO("mysql:host=localhost;dbname=e_logs", 'admin', 'admin');

$__firstname = $_POST['first_name'];
$__middlename = $_POST['middle_name'];
$__lastname = $_POST['last_name'];
$__enumcheckbox = $_POST['enum_trans_type'];

if (empty($__middlename) == true) {
    $stmt = $connect->prepare("INSERT INTO logs (type, first_name, last_name) VALUES (:transtype, :firstname, :lastname)");
    $stmt->bindParam(':transtype', $__enumcheckbox[0]);
    $stmt->bindParam(':firstname', $__firstname);
    $stmt->bindParam(':lastname', $__lastname);
    $stmt->execute();
} else {
    $stmt = $connect->prepare("INSERT INTO logs (type, first_name, middle_name, last_name) VALUES (:transtype, :firstname, :middlename, :lastname)");
    $stmt->bindParam(':transtype', $__enumcheckbox[0]);
    $stmt->bindParam(':firstname', $__firstname);
    $stmt->bindParam(':middlename', $__middlename);
    $stmt->bindParam(':lastname', $__lastname);
    $stmt->execute();
}

header("location: ../../index.php");