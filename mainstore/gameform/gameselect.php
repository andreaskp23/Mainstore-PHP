<?php
require_once "koneksi.php";
$connection = getConnection();
session_start();

$sql = "select * from product JOIN genre ON product.genre_id = genre.genre_id WHERE Cetegory_id = '1';";
$result = $connection->query($sql);
$product = $result->fetchAll();

$sql = "select * from genre WHERE genre_id<4;";
$result = $connection->query($sql);
$genre = $result->fetchAll();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Select</title>
    <link rel="stylesheet" type="text/css" href="gameselect.css">
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
    <div class="genre-layout">
        <button id="allbtn" class="genre-btn">
            All
        </button>
        <button id="horrorbtn" class="genre-btn">
            horror
        </button>
        <button id="sportbtn" class="genre-btn">
            sport
        </button>
        <button id="racingbtn" class="genre-btn">
            racing
        </button>
    </div>
    <div class="game-layout">
            <?php foreach ($product as $r): ?>
                <article class="card" id="<?= $r['genre_name']; ?>">
                    <div class="card-int">
                        <span class="card__span"><?= $r['genre_name']; ?></span>
                        <div class="img"><img src="<?= $r['image']; ?>" alt="" width="200px"></div>
                        <div class="card-data"><br>
                            <p class="title"><?= $r['name_product']; ?></p>
                            <?php
                                $formattedHarga = 'Rp ' . number_format($r['price_product'], 0, ',', '.');
                            ?>
                            <p><?= $formattedHarga; ?></p>
                            <a href="gameUI.php?id_product=<?= $r['id_product']; ?>">
                                <button class="button">Buy Now</button>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  
    <script>
        let allbtn = document.getElementById('allbtn');
        let horrorbtn = document.getElementById('horrorbtn');
        let racingbtn = document.getElementById('racingbtn');
        let sportbtn = document.getElementById('sportbtn');

        const cards = document.getElementsByClassName('card');

        horrorbtn.addEventListener('click', function() {
            filterCards('Horror');
        });

        racingbtn.addEventListener('click', function() {
            filterCards('Racing');
        });

        sportbtn.addEventListener('click', function() {
            filterCards('Sport');
        });

        allbtn.addEventListener('click', function() {
            showAllCards();
        });

        function filterCards(genre) {
            for (let i = 0; i < cards.length; i++) {
                if (cards[i].id.toLowerCase() === genre.toLowerCase()) {
                    cards[i].style.display = 'block';
                } else {
                    cards[i].style.display = 'none';
                }
            }
        }

        function showAllCards() {
            for (let i = 0; i < cards.length; i++) {
                cards[i].style.display = 'block';
            }
        }
    </script>
</body>
</html>