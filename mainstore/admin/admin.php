<?php
require_once "koneksiAdmin.php";
$connection = getConnection();
session_start();

if($_SESSION['username'] == "admin") {
}
else{
    header("Location: ../index.php");
}

$sql = "select * from user";
$result = $connection->query($sql);
$user = $result->fetchAll();

$sql = "select * from view_history ORDER BY waktuPembelian ASC";
$result = $connection->query($sql);
$view_history = $result->fetchAll();

$sql = "select * from view_history_g ORDER BY waktuPembelian ASC";
$result = $connection->query($sql);
$view_history_g = $result->fetchAll();

$sql = "select * from view_history_t ORDER BY waktuPembelian ASC";
$result = $connection->query($sql);
$view_history_t = $result->fetchAll();



$sql = "select * from view_product";
$result = $connection->query($sql);
$view_product = $result->fetchAll();

$sql = "select * from view_product WHERE Cetegory_name='Game'";
$result = $connection->query($sql);
$view_product_game = $result->fetchAll();

$sql = "select * from view_product WHERE Cetegory_name='Top Up'";
$result = $connection->query($sql);
$view_product_top = $result->fetchAll();

$sql = "select * from topupgame WHERE topUpGameID > 0";
$result = $connection->query($sql);
$topupgame = $result->fetchAll();
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../admin/styleAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Admin Page, Hello Admin!</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link" href="#" id="user">User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="history">History</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="product">Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="gametopup">Game Top Up</a>
                </li>
                <li class="nav-item">
                    <a href="addgametopup.php" class="nav-link">
                        Add Game Top Up                    
                    </a>
                </li>
                <li class="nav-item">
                    <a href="addgame.php" class="nav-link">
                        Add Game                     
                    </a>
                </li>
                <li class="nav-item">
                    <a href="addtopup.php" class="nav-link">
                        Add Top Up                     
                    </a>
                </li>
                <li class="nav-item">                  
                    <a class="nav-link" href="../SignIn_dan_SignUp/logout.php"><button>Log Out </button></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <div id="userTable" class="div-table">
        <p style="display: none;"><?= $nomer = 1 ?></p>
        <h1 class="title-table">USER</h1>
        <table class="table table-bordered mt-4 table-Secondary table-striped-columns">
            <tr>
                <th>Number</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Password</th>
                <th class="button-title-table">Button</th>
            </tr>
            <?php foreach ($user as $r): ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $r['user_name']; ?></td>
                    <td><?= $r['email']; ?></td>
                    <td><?= $r['password']; ?></td>
                    <td class="button-place">
                        <a href="editUser.php?user_id=<?= $r['user_id']; ?>" class="button-link">
                            <button class="button-table">
                                Edit
                            </button>                       
                        </a>
                        <a href="deleteUser.php?user_id=<?= $r['user_id']; ?>" class="button-link" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <button class="button-table">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>


    <div id="historyTable" class="div-table table-Secondary table-striped-columns">
        <h1 class="title-table">History</h1>
        <div class="product-btn">
            <button id="historyA">All History</button>
            <button id="historyG">Game History</button>
            <button id="historyT">Top Up History</button>
        </div>
    <div id="historyAll">
    <p style="display: none;"><?= $nomer = 1 ?></p>
        <table class="table table-bordered table-Secondary mt-4 table-striped-columns">
                <tr>
                    <th>Number</th>
                    <th>UserID</th>
                    <th>Product Name</th>
                    <th>Price (IDR)</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Total Price (IDR)</th>
                </tr>
                <?php foreach ($view_history as $r): ?>
                    <tr>
                        <td><?= $nomer++ ?></td>
                        <td><?= $r['user_id']; ?></td>
                        <td><?= $r['name_product']; ?></td>
                        <td><?= $r['price_product']; ?></td>
                        <td><?= $r['quantity']; ?></td>
                        <td><?= $r['waktuPembelian']; ?></td>
                        <td><?= $r['total harga']; ?></td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
    </div>
    <div id="historyGame">
    <p style="display: none;"><?= $nomer = 1 ?></p>
        <table class="table table-bordered mt-4 table-Secondary table-striped-columns">
            <tr>
                <th>Number</th>
                <th>UserID</th>
                <th>Product Name</th>
                <th>Price (IDR)</th>
                <th>Quantity</th>
                <th>Courier</th>
                <th>Address</th>
                <th>Date</th>
                <th>Total Price (IDR)</th>
            </tr>
            <?php foreach ($view_history_g as $r): ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $r['user_id']; ?></td>
                    <td><?= $r['name_product']; ?></td>
                    <td><?= $r['price_product']; ?></td>
                    <td><?= $r['quantity']; ?></td>
                    <td><?= $r['Kurir']; ?></td>
                    <td><?= $r['alamat']; ?></td>
                    <td><?= $r['waktuPembelian']; ?></td>
                    <td><?= $r['total harga']; ?></td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div id="historyTop">
    <p style="display: none;"><?= $nomer = 1 ?></p>
    <table class="table table-bordered mt-4 table-Secondary table-striped-columns">
            <tr>
                <th>Number</th>
                <th>UserID</th>
                <th>Product Name</th>
                <th>Price (IDR)</th>
                <th>Date</th>
                <th>Total Price (IDR)</th>
            </tr>
            <?php foreach ($view_history_t as $r): ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $r['user_id']; ?></td>
                    <td><?= $r['name_product']; ?></td>
                    <td><?= $r['price_product']; ?></td>
                    <td><?= $r['waktuPembelian']; ?></td>
                    <td><?= $r['total harga']; ?></td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    </div>
    

    <div id="productTable" class="div-table">
        <h1 class="title-table">Product</h1>
        <div class="product-btn">
            <button id="productAbtn">All Product</button>
            <button id="productGbtn">Game product</button>
            <button id="productTbtn">Top Up product</button>
        </div>
        <div>
            
        </div>
        <div id="productALL">
        <p style="display: none;"><?= $nomer = 1 ?></p>
        <table class="table table-bordered mt-4 product-table table-Secondary table-striped-columns">
            <tr>
                <th>Number</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Genre</th>
                <th>Category</th>
            </tr>
            <?php foreach ($view_product as $r): ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $r['name_product']; ?></td>
                    <td><?= $r['price_product']; ?></td>
                    <td><?= $r['genre_name']; ?></td>
                    <td><?= $r['Cetegory_name']; ?></td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>

        <div id="productGame">
        <p style="display: none;"><?= $nomer = 1 ?></p>
        <table class="table table-bordered mt-4 product-table table-Secondary table-striped-columns">
            <tr>
                <th>Number</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Genre</th>
                <th>Category</th>
            </tr>
            <?php foreach ($view_product_game as $r): ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $r['name_product']; ?></td>
                    <td><?= $r['price_product']; ?></td>
                    <td><?= $r['genre_name']; ?></td>
                    <td><?= $r['Cetegory_name']; ?></td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>


        <div id="productTop">
        <p style="display: none;"><?= $nomer = 1 ?></p>
        <table class="table table-bordered mt-4 product-table table-Secondary table-striped-columns">
            <tr>
                <th>Number</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Genre</th>
                <th>Category</th>
                <th>Game Name</th>
            </tr>
            <?php foreach ($view_product_top as $r): ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $r['name_product']; ?></td>
                    <td><?= $r['price_product']; ?></td>
                    <td><?= $r['genre_name']; ?></td>
                    <td><?= $r['Cetegory_name']; ?></td>
                    <td><?= $r['topUpGameName']; ?></td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
    </div>

    
    <div id="gametopuptable" class="div-table">
    <p style="display: none;"><?= $nomer = 1 ?></p>
        <h1 class="title-table">Top Up Game</h1>
            <table class="table table-bordered table-Secondary table-striped-columns mt-4">
            <tr>
                <th>Nomer</th>
                <th>Game Name</th>
                <th>Gambar</th>
                <th>Desc Game</th>
            </tr>
            <?php foreach ($topupgame as $r): ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $r['topUpGameName']; ?></td>
                    <td><img src="<?= $r['topUpGameImg']; ?>" alt="" width="140px"></td>
                    <td><?= $r['topUpGameDesc']; ?></td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

      <script src="scriptAdmin.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  
</body>
</html>