<?php

require "../includes/auth.php";
require "../config/db.php";
require "../includes/header.php";

$companyId = $_SESSION["company_id"];

$stmt = $pdo->prepare(
    "SELECT *
     FROM customers
     WHERE company_id = ?"
);

$stmt->execute([$companyId]);

$customers = $stmt->fetchAll();

?>

<h2>Customers</h2>

<a href="create.php"
class="btn btn-primary mb-3">
Add Customer
</a>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Actions</th>
</tr>

<?php foreach($customers as $customer): ?>

<tr>

<td><?= $customer['customer_id']; ?></td>

<td><?= htmlspecialchars($customer['customer_name']); ?></td>

<td><?= htmlspecialchars($customer['email']); ?></td>

<td><?= htmlspecialchars($customer['phone']); ?></td>

<td>

<a href="edit.php?id=<?= $customer['customer_id']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete.php?id=<?= $customer['customer_id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete customer?')">
Delete
</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<a href="../dashboard/index.php"
class="btn btn-secondary">
Back
</a>

<?php

require "../includes/footer.php";

?>
