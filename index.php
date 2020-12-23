<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header('location:login.php');
    }

    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        if ($role == 'customer') {
            header('location:customer/index.php');
        }
        if ($role == 'admin') {
            header('location:admin/index.php');
        }
    }
    $url = $_SERVER['REQUEST_URI'];
?>