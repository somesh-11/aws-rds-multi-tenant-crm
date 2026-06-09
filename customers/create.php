<?php

require "../includes/auth.php";
require "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $pdo->prepare(
        "INSERT INTO customers
        (
            company_id,
            customer_name,
            email,
            phone
        )
        VALUES
        (
            ?, ?, ?, ?
        )"
    );

    $stmt->execute([
        $_SESSION["company_id"],
        $_POST["customer_name"],
        $_POST["email"],
        $_POST["phone"]
    ]);

    header("Location: list.php");
    exit;
}
?>

<?php require "../includes/header.php"; ?>

<h2>Add Customer</h2>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input
type="text"
name="customer_name"
class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input
type="email"
name="email"
class="form-control">
</div>

<div class="mb-3">
<label>Phone</label>
<input
type="text"
name="phone"
class="form-control">
</div>

<button class="btn btn-success">
Save Customer
</button>

</form>

<?php require "../includes/footer.php"; ?>
