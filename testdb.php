<?php

$host = "crm-db.cla2w8a2oiff.eu-north-1.rds.amazonaws.com";
$dbname = "crm-db";
$user = "admin";
$password = "somesh112005";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $password
    );

    echo "Connected to RDS";

} catch(PDOException $e) {
    echo $e->getMessage();
}
