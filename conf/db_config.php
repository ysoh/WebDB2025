<?php
$servername = "infodb.ansan.ac.kr";
$username = "i2551500";
$password = "wjdqh..rhk";
$dbname = "db2551500_WebDB2025";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>