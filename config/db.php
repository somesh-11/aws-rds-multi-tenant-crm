<?php

$host = "crm-db.cla2w8a2oiff.eu-north-1.rds.amazonaws.com";
$dbname = "crm-db";
$user = "your_user_id";
$password = "your_password";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
