<?php
require_once "koneksi.php";
$connection = getConnection();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_product = $_POST['id_product'];
    $user_id = $_POST['user_id'];

    $stmt3 = $connection->prepare("INSERT INTO history (user_id, id_product) VALUES (?,?)");
    $stmt3->execute([$user_id, $id_product]);
    header("Location: ../index.php");
}

if (isset($_GET['topUpGameID'])) {
    $topUpGameID = $_GET['topUpGameID'];
    $stmt = $connection->prepare("SELECT * FROM topupgame WHERE topUpGameID = ? ");
    $stmt->execute([$topUpGameID]);
    $topupgame = $stmt->fetch();

    $stmt2 = $connection->prepare("SELECT * FROM product WHERE topUpGameID = ?");
    $stmt2->execute([$topUpGameID]);
    $result2 = $stmt2->fetchAll();
} 

if(isset($_SESSION['username'])) {
}
else{
    header("Location: ../index.php");
}
?>