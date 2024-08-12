<?php
require_once "koneksiAdmin.php";
$connection = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topUpGameName = $_POST['topUpGameName'];
    $topUpGameDesc = $_POST['topUpGameDesc'];
    $topUpGameImg = $_POST['topUpGameImg'];


    $stmt = $connection->prepare("INSERT INTO topupgame (topUpGameName, topUpGameDesc, topUpGameImg) VALUES (?,?,?)");
    $stmt->execute([$topUpGameName, $topUpGameDesc, $topUpGameImg]);

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
        <form method="post" action="" class="form">

        <div class="title">Fill the Form below<br><span>to create a new game top up</span></div>

        <input type="text" placeholder="Game Name" name="topUpGameName" class="input" id="topUpGameName" required>
        <input type="text" placeholder="Image-Link" name="topUpGameImg" class="input" id="topUpGameImg" required>

        <textarea id="topUpGameDesc" name="topUpGameDesc" rows="4" cols="50" placeholder="Description for the game" class="input" required></textarea>

        <button type="submit" class="button-confirm">Submit</button>
        </form>
        </div>
    </div>
</body>
</html>