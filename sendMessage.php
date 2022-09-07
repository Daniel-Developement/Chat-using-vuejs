<?php

session_start();

require __DIR__ . '/config.php';

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if (!isset($_GET['message'])) {
    header("Location: panel.php");
    exit;
}

$message = $_GET['message'];
$date = date('Y-m-d H:m:s');
$username = $_SESSION['user'];

mysqli_query($conn, "INSERT INTO `message`(`username`, `date`, `content`)
VALUES ('$username','$date','$message')");

$arr = [
    'username' => $username,
    'content' => $message,
    'date' => $date,
];

echo json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
