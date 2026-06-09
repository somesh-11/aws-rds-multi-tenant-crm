<?php

require "../includes/auth.php";
require "../config/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "DELETE FROM customers
     WHERE customer_id = ?
     AND company_id = ?"
);

$stmt->execute([
    $id,
    $_SESSION['company_id']
]);

header("Location: list.php");
exit;
