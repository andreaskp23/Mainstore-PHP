<?php
require_once "topupUIphp.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $topupgame['topUpGameName']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        <?php include "topup.css" ?>
    </style>
        <style>
        <?php include "receipt.css" ?>
    </style>
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
      <!--BTS-->
      <div class="main">
        <div class="left">
                <div class="left-top">
                    <img src="<?= $topupgame['topUpGameImg']; ?>" alt="" class="img-thumb">
                    <div class="left-top-right">
                        <h1><b><?= $topupgame['topUpGameName']; ?></b></h1><hr>
                        <p><?= $topupgame['topUpGameDesc']; ?></p>
                    </div>
                </div>

                <div class="left-bot">
                    <?php foreach ($result2 as $r): ?>
                        <div class="card mb-3 ms-2 me-2 splash">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $r['image']; ?>" class="img-fluid rounded-start img-prod" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title"><?= $r['name_product']; ?></h5>
                                <p class="card-text">Rp.<?= $r['price_product']; ?></p>
                                </div>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            
        </div>
        <div class="right">
        <form method="post" action="">
            <hr>
                <div style="padding: 15px;">
                <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user_id'] ?>">
                <label for="user_id">User ID:   <?= $_SESSION['user_id'] ?></label><br>
                <label for="username">User Name:   <?= $_SESSION['username'] ?></label><br><br>
                </div>
                <div class="radio-place">
                    <?php foreach ($result2 as $r): ?>
                        <div class="radio-btn">
                        <input type="radio" name="id_product" value="<?= $r['id_product']; ?>"> <?= $r['name_product']; ?> <br>
                        </div>
                    <?php endforeach; ?>
                </div>
                <br><hr>
                <div class="jc-center">
                    <div class="button-borders">
                        <button type="submit" class="primary-button" id="checkoutbtn"> Checkout
                        </button>
                    </div>
                </div>
            </form>
        </div>

    <script src="receiptTop.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  

</body>
</html>