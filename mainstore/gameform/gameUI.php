<?php
require_once "koneksi.php";
$connection = getConnection();
session_start();

if(isset($_SESSION['username'])) {
}
else{
    header("Location: ../index.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_product = $_POST['id_product'];
    $user_id = $_POST['user_id'];
    $jumlah = $_POST['jumlah'];
    $alamat = $_POST['alamat'];
    $kurir_id = $_POST['kurir_id'];

    $stmt = $connection->prepare("INSERT INTO history (user_id, id_product, jumlah, kurir_id, alamat) VALUES (?,?,?,?,?)");
    $stmt->execute([$user_id, $id_product, $jumlah, $kurir_id, $alamat]);

    $lastInsertId = $connection->lastInsertId();
    echo "Last inserted ID is: " . $lastInsertId;

    header("Location: receiptgame.php?history_id=$lastInsertId");
}

if (isset($_GET['id_product'])) {
    $id_product = $_GET['id_product'];
    $stmt = $connection->prepare("SELECT * FROM product WHERE id_product = ? ");
    $stmt->execute([$id_product]);
    $product = $stmt->fetch();

    $stmt2 = $connection->prepare("SELECT * FROM genre WHERE genre_id = ?");
    $stmt2->bindParam(1, $product['genre_id'], PDO::PARAM_STR);
    $stmt2->execute();
    $result2 = $stmt2->fetch();

} else {
    header('Location: gameselect.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $product['name_product']; ?></title>
    <style>
        <?php include "game.css" ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="body">
<nav class="navbar navbar-expand-lg" style="background-color: #5c00a3; color: white; height: 40px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" onclick="history.back()"><button>Back</button></a>
          <div>
            <h6>Session now is: <?= $_SESSION['username']; ?></h6>
          </div>
        </div>
      </nav>

    <div class="layout">
        <div class="left">
            <img src="<?= $product['image']; ?>" alt="" width="300px" style="border-radius: 20px; border: 1px solid black;">
        </div>
        <div class="middle">
            <div class="title-price">
                <h2><b><?= $product['name_product']; ?></b></h2>
                <h1><b>Rp.<?= $product['price_product']; ?></b></h1>
            </div>
            <p> Size: <?= $product['productsize']; ?></p>
            <p> Genre: <?= $result2['genre_name']; ?></p>
            <p> Condition: New</p>
            <p><?= $product['productdesc']; ?></p>
        </div>
        <div class="right jc-center">
            <form method="post" action="">
                <hr>
                <input type="hidden" name="id_product" id="id_product" value="<?= $product['id_product']; ?>">
                <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user_id'] ?>">

                <label for="user_id">User ID:   <?= $_SESSION['user_id'] ?></label><br>
                <label for="user_id">User Name:   <?= $_SESSION['username'] ?></label><br><br>

                <label for="jumlah">Quantity:</label><br>
                <input type="text" name="jumlah" id="jumlah"  required><br><br>

                <label for="alamat">Alamat:</label><br>
                <input type="text" name="alamat" id="alamat"  required><br><br>

                <label for="kurir_id ">Kurir:</label>
                <select name="kurir_id" id="kurir_id" >
                    <option value="1">Sicepat</option>
                    <option value="2">Grab Express</option>
                    <option value="3">JNE</option>
                    <option value="4">JNT</option>
                </select>

                <br><hr>
                <div class="jc-center">
                    <div class="button-borders">
                        <button type="submit" class="primary-button"> Checkout
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  
</body>
</html>