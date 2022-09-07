<?php

session_start();

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/config.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM message");

$arr = mysqli_fetch_all($query, MYSQLI_ASSOC);

echo json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
