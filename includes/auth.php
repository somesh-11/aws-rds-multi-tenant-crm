<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /crm/auth/login.php");
    exit;
}
