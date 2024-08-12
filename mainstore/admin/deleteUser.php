<?php
require_once "koneksiAdmin.php";
$connection = getConnection();

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $stmt = $connection->prepare("DELETE FROM user WHERE user_id = ?");
    $stmt->execute([$user_id]);

    header('Location: admin.php');
} else {
    header('Location: admin.php');
}