<?php

session_start();

require __DIR__ . '/config.php';


if (!isset($_POST['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_POST['username'];

$query = mysqli_query($conn, "SELECT * FROM accounts WHERE username = '$username'");

if (mysqli_num_rows($query) > 0) {
    $arr = mysqli_fetch_assoc($query);
} else {
    mysqli_query($conn, "INSERT INTO `accounts`(`username`) VALUES ('$username')");
    $query = mysqli_query($conn, "SELECT * FROM accounts WHERE username = '$username'");
    $arr = mysqli_fetch_assoc($query);
}

$_SESSION['user'] = $arr['username'];
header("Location: panel.php");
exit;
