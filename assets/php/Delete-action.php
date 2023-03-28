<?php

$__userid = $_GET['id'];

$connect = new PDO("mysql:host=localhost;dbname=e_logs", 'admin', 'admin');
$stmt = $connect->prepare("DELETE FROM logs WHERE id=$__userid");
$stmt->execute();

header("location: ../php/Datalist.php");