<?php
require_once "koneksiAdmin.php";
$connection = getConnection();

$sql = "select * from genre";
$stmt2 = $connection->query($sql);
$result2 = $stmt2->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_product = $_POST['name_product'];
    $price_product = $_POST['price_product'];
    $Quantity = $_POST['Quantity'];

    $Cetegory_id  = $_POST['Cetegory_id'];
    $genre_id  = $_POST['genre_id'];
    $image = $_POST['image'];
    $productdesc = $_POST['productdesc'];
    $productsize = $_POST['productsize'];



    $stmt = $connection->prepare("INSERT INTO product (name_product, price_product, Quantity, Cetegory_id, genre_id, image, productdesc, productsize) 
    VALUES (?,?,?,?,?,?,?,?)");
    $stmt->execute([$name_product, $price_product, $Quantity, $Cetegory_id, $genre_id, $image, $productdesc, $productsize]);
    header('Location: admin.php');
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include "addmenu.css" ?>
    </style>
</head>
<body>
    <div class="layout" >
        <div class="left">
        <div class="title">Rules:<br><br>
            <span>- Make sure the data entered is correct</span><br>
            <span>- Data that has been submitted cannot be deleted unless you contact the administrator to delete it directly via the database.</span><br>
            <span>- Images entered must have a ratio of 1:1 (square)</span><br>
            <span>- The image link can be an Internet website link or a path on a local device.</span><br><br><br><br><br>
            <a href="admin.php">
                <button class="button-confirm">Go Back</button>                     
            </a>
        </div>
        </div>

        <div class="right">
        <form method="post" action="" class="formgame">
        <div class="title" style="width:100%; text-align:center;">Fill the Form below<br><span>to inputing the new Game</span></div>
        <div class="kiri">
            <input type="text" placeholder="Game Name" name="name_product" class="input" id="name_product" required><br><br>
            <input type="number" placeholder="Price" name="price_product" class="input" id="price_product" required><br><br>
            <input type="number" placeholder="Quantity" name="Quantity" class="input" id="Quantity" required><br><br>
            <input type="text" placeholder="size" name="productsize" class="input" id="productsize" required>
        </div>

        <div class="kanan">
        <select name="genre_id" class="input" placeholder="Genre">
            <?php foreach ($result2 as $r): ?>
                <option value="<?= $r['genre_id']; ?>"><?= $r['genre_name']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
            <input type="text" placeholder="image link/path" name="image" class="input" id="image" required><br><br>
            <textarea id="productdesc" name="productdesc" rows="4" cols="50" placeholder="Description for the game" class="input" required></textarea>
            <input type="hidden" name="Cetegory_id" class="input" id="Cetegory_id" value="1">
        </div>

        <button type="submit" class="button-confirm">Submit</button>
        </form>
        </div>
    </div>
</body>
</html>