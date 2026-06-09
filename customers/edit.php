<?php

require "../includes/auth.php";
require "../config/db.php";
require "../includes/header.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "SELECT *
     FROM customers
     WHERE customer_id = ?
     AND company_id = ?"
);

$stmt->execute([
    $id,
    $_SESSION['company_id']
]);

$customer = $stmt->fetch();

if (!$customer) {
    die("Customer not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $pdo->prepare(
        "UPDATE customers
         SET customer_name=?,
             email=?,
             phone=?
         WHERE customer_id=?
         AND company_id=?"
    );

    $stmt->execute([
        $_POST['customer_name'],
        $_POST['email'],
        $_POST['phone'],
        $id,
        $_SESSION['company_id']
    ]);

    header("Location: list.php");
    exit;
}

?>

<h2>Edit Customer</h2>

<form method="POST">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="customer_name"
class="form-control"
value="<?= htmlspecialchars($customer['customer_name']) ?>">

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?= htmlspecialchars($customer['email']) ?>">

</div>

<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?= htmlspecialchars($customer['phone']) ?>">

</div>

<button
type="submit"
class="btn btn-success">
Update Customer
</button>

<a href="list.php"
class="btn btn-secondary">
Cancel
</a>

</form>

<?php

require "../includes/footer.php";

?>
