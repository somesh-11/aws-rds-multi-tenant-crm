<?php

session_start();

require "../config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare(
        "SELECT * FROM users WHERE email = ?"
    );

    $stmt->execute([$email]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {

        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["company_id"] = $user["company_id"];
        $_SESSION["name"] = $user["name"];

        header("Location: ../dashboard/index.php");
        exit;
    }

    $error = "Invalid Login";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>CRM Login</h2>

<?php if($error): ?>
<div class="alert alert-danger">
    <?php echo $error; ?>
</div>
<?php endif; ?>

<form method="POST">

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<button class="btn btn-primary">
Login
</button>

</form>

</div>

</body>
</html>
