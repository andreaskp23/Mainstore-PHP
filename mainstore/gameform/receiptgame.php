<?php 
require_once "koneksi.php";
$connection = getConnection();

if (isset($_GET['history_id'])) {
    $history_id = $_GET['history_id'];
    $stmt = $connection->prepare("SELECT * FROM history 
    JOIN product ON history.id_product = product.id_product 
    JOIN kurir ON history.kurir_id = kurir.kurir_id
    JOIN user ON history.user_id = user.user_id
    WHERE history_id = ? ");
    $stmt->bindParam(1, $history_id, PDO::PARAM_STR);
    $stmt->execute();
    $history = $stmt->fetch();

} else {

}

if (isset($_POST['homeButton'])) {
    header('Location: ../index.php');
    exit;
  }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="receipt.css">
</head>
<body class="body">
    <div>
        <div class="master-container">
            <div class="card cart">
                <label class="title">Your Receipt</label>
                <div class="products">
                <div class="product">
                    <img src="<?= $history['image']; ?>" alt="" height="60px" width="60px">
                    <div>
                    <span><?= $history['name_product']; ?></span>
                    <p><?= $history['name_kurir']; ?></p>
                    <p>Receipt ID: <?= $history['history_id']; ?></p>
                    </div>
                    <div class="quantity">

                    <label style="text-align: center;"><?= $history['jumlah']; ?></label>

                    </div>
                    <label class="price small"> <?= $formattedHarga = 'Rp ' . number_format($history['price_product'], 0, ',', '.'); ?></label>
                </div>
                </div>
            </div>

            <div class="card checkout">
                <label class="title">User</label>
                <div class="details">
                    <span><?= $history['user_name']; ?></span><br>
                    <span><?= $history['email']; ?></span>
                </div>
            </div>

            <div class="card checkout">
                <label class="title">Checkout</label>
                <div class="details">
                <span>Your item subtotal:</span>
                <span><?= $formattedHarga = 'Rp ' . number_format($history['jumlah'] * $history['price_product'], 0, ',', '.'); ?></span>
                <span>Shipping fees:</span>
                <span><?= $formattedHarga = 'Rp ' . number_format($history['price_kurir'], 0, ',', '.'); ?></span>
                <span style="color: red;">Remember to take the Screen Shot before leaving this page</span><br>
                </div>
                <div class="checkout--footer">
                <label class="price"><sup>Rp</sup>
                <?= $formattedHarga = number_format($history['price_kurir'] + ($history['jumlah'] * $history['price_product']), 0, ',', '.'); ?></label>
                <form method="post">
                    <button type="submit" name="homeButton" class="checkout-btn">Home</button>
                </form>
                </div>
            </div>
            </div>
        </div>
</body>
</html>