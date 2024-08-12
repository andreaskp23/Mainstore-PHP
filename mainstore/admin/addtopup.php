<?php
require_once "koneksiAdmin.php";
$connection = getConnection();

$sql = "select * from topupgame WHERE topUpGameID > 0";
$stmt2 = $connection->query($sql);
$result2 = $stmt2->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_product = $_POST['name_product'];
    $price_product = $_POST['price_product'];
    $image = $_POST['image'];
    $topUpGameID  = $_POST['topUpGameID'];

    $Quantity = '100000';
    $Cetegory_id  = '2';
    $genre_id  = '4';


    $stmt = $connection->prepare("INSERT INTO product (name_product, price_product, Quantity, Cetegory_id, genre_id, image, topUpGameID) 
    VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$name_product, $price_product, $Quantity, $Cetegory_id, $genre_id, $image, $topUpGameID]);
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
            <span>- The image can be uploaded with a background or without the background</span><br>
            <span>- The image link can be an Internet website link or a path on a local device.</span><br><br><br>
            <a href="admin.php">
                <button class="button-confirm">Go Back</button>                     
            </a>
        </div>
        </div>
        
        

        <div class="right">
        <form method="post" action="" class="form">

        <div class="title">Fill the Form below<br><span>to create a new game top up</span></div>

        <input type="text" placeholder="Product Name" name="name_product" class="input" id="name_product" required>
            <input type="number" placeholder="Price" name="price_product" class="input" id="price_product" required>
            <input type="text" placeholder="image link/path" name="image" class="input" id="image" required>

            <select name="topUpGameID" class="input" placeholder="Game">
                <?php foreach ($result2 as $r): ?>
                    <option value="<?= $r['topUpGameID']; ?>"><?= $r['topUpGameName']; ?></option>
                <?php endforeach; ?>
            </select>
        <button type="submit" class="button-confirm">Submit</button>
        </form>
        </div>




    </div>
</body>
</html>