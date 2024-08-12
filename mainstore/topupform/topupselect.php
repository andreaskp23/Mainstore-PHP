<?php
require_once "koneksi.php";
$connection = getConnection();
session_start();

$sql = "select * from topupgame WHERE topUpGameID > 0";
$result = $connection->query($sql);
$product = $result->fetchAll();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Game</title>
    <style>
        <?php include "topupselect.css" ?>
    </style> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="body">
<nav class="navbar navbar-expand-lg" style="background-color: #5c00a3; color: white; height: 40px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" onclick="history.back()"><button>Back</button></a>
          <div>
            <?php if(isset($_SESSION['username'])) {?>
                <h6>Session now is: <?= $_SESSION['username']; ?></h6>
            <?php }?>
          </div>
        </div>
      </nav>
<div class="game-layout">
            <?php foreach ($product as $r): ?>
                <article class="card">
                    <div class="card-int">
                        <div class="img"><img src="<?= $r['topUpGameImg']; ?>" alt="" width="200px"></div>
                        <div class="card-data"><br>
                            <p class="title"><?= $r['topUpGameName']; ?></p>

                            <a href="topupUI.php?topUpGameID=<?= $r['topUpGameID']; ?>">
                                <button class="button">Top Up</button>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
            </div>
</body>
</html>