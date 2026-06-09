<?php

require "../includes/auth.php";
require "../includes/header.php";

?>

<h1>Dashboard</h1>

<p>
Welcome <?= $_SESSION["name"] ?>
</p>

<a href="../customers/list.php"
class="btn btn-primary">
Manage Customers
</a>

<a href="../auth/logout.php"
class="btn btn-danger">
Logout
</a>

<?php

require "../includes/footer.php";

?>
