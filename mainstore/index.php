<?php
session_start();
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Store</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Pixelify+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #5c00a3;"  data-bs-theme="dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.html#"><img src="img/logo-no-background.png" alt="" width="60px"></a>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php#">Go Up</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="index.php#jajan">Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="index.php#about">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="index.php#reason">Reason</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="index.php#join-us">Start Now</a>
                  </li>
                  <?php if(isset($_SESSION['username'])) {?>
                    <li class="nav-item">
                      <a class="nav-link active" href="../mainstore/SignIn_dan_SignUp/logout.php">Log Out</a>
                    </li>
                  <?php }?>
                    
            </ul>
          </div>
        </div>
      </nav>


    <section class="parallax">
        <img src="img/parallax/background-plain.jpg" id="latar" class="parallax-img">
        <h1 class="parallax-text display-3" id="text">
            Main Store <br>
            <?php if(isset($_SESSION['username'])) {?>
            Hello <?= $_SESSION['username']; ?>
            <?php }?>
        </h1>
        <img src="img/parallax/awan1.jpg" id="awan1" class="parallax-img">
        <img src="img/parallax/awan2.jpg" id="awan2" class="parallax-img">
        <img src="img/parallax/hill-dpn.png" id="hill" class="parallax-img">
    </section>

    <section class="sec2" id="jajan">
        <h1 class="title-sec2">Mau Pesan Apa Hari Ini?</h1>
        <div class="menu">
                <div class="menu1 menu-all" id="topUpPage">
                    <a href="topupform/topupselect.php" class="an">
                        <h2 class="menu-title">Top Up</h2>
                        <p class="menu-desc">Top up di sini bukan hanya sekadar transaksi, 
                            tapi penciptaan kenangan. Kami memberikan Anda 
                            kekuatan untuk mengisi daya perjalanan 
                            game online favorit.</p>
                    </a>
                </div>
                <div class="menu2 menu-all" id="gamePage">
                    <a href="gameform/gameselect.php" class="an">
                        <h2 class="menu-title">Beli Game</h2>
                        <p class="menu-desc">Di sini, membeli game bukanlah sekadar mendapatkan 
                            kode atau permainan, melainkan menjadi arkitek dari 
                            petualangan digital Anda sendiri. Setiap pembelian 
                            adalah langkah pertama menuju dunia baru yang 
                            menakjubkan
                        </p>
                    </a>
                </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="con">
            <img src="img/logo-black.png" alt="" class="logo">
            <div class="about-right">
                <h2 class="about-title">Main Store Indonesia</h2>
                <p class="about-desc">Di sini, membeli game bukanlah sekadar mendapatkan 
                    kode atau permainan, melainkan menjadi arkitek dari 
                    petualangan digital Anda sendiri. Setiap pembelian 
                    adalah langkah pertama menuju dunia baru yang 
                    menakjubkan
                </p>
            </div>
        </div>
    </section>

    <section class="reason" id="reason">
        <h3 class="alasan left"><img src="img/andrius-crop.gif" class="andrius"> Telah dipercaya lebih dari 10 tahun!</h3>
        <h3 class="alasan right">Menerima ribuan order perbulannya! <img src="img/ruin-guard-no-bg.gif" class="gif ruin"> </h3>
        <h3 class="alasan left"><img src="img/slime.gif" class="gif slime">Legal, murah, dan terpercaya.</h3>
    </section>

    <!--Section buat sign in ama sign up-->
    <section class="join-us" id="join-us">
        <h1 class="title-sec2">Ayo join Main Store Sekarang Juga!</h1>
        <p class="menu-desc">
            Sign Up sekarang dan bergabunglah dengan ribuan Gamers diseluruh Indonesia
            sekarang, Gratis!
        </p><br><br><br>

         <!--Section button sign in ama sign up-->
        <div class="signButton">
                <a href="SignIn_dan_SignUp/Signin_form.php">
                    <button class="button-sign" id="signIn">Sign In</button>
                </a>
            
            <a href="SignIn_dan_SignUp/Signup_form.php"><button id="signUp" class="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13c0 .823-.076 1.626-.22 2.403l1.94 1.832a.5.5 0 0 1 .095.603l-2.495 4.575a.5.5 0 0 1-.793.114l-2.234-2.234a1 1 0 0 0-.707-.293H9.414a1 1 0 0 0-.707.293l-2.234 2.234a.5.5 0 0 1-.793-.114l-2.495-4.575a.5.5 0 0 1 .095-.603l1.94-1.832C5.077 14.626 5 13.823 5 13zm1.476 6.696l.817-.817A3 3 0 0 1 9.414 18h5.172a3 3 0 0 1 2.121.879l.817.817.982-1.8-1.1-1.04a2 2 0 0 1-.593-1.82c.124-.664.187-1.345.187-2.036 0-3.87-1.995-7.3-5-8.96C8.995 5.7 7 9.13 7 13c0 .691.063 1.372.187 2.037a2 2 0 0 1-.593 1.82l-1.1 1.039.982 1.8zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path></svg>
                <span>Sign Up</span>
            </button></a>
        </div>

            <div class="footer">
            <div class="footer-text">
                <div class="left-foot">
                 <p>Copyright MainStore.ltd</p>
                </div>
                <div class="right-foot">
                 <p>Mainstore, Depok, Indonesia</p>
                </div>
            </div>
            <div class="footer-text">
                <div class="left-foot">
                 <p>@MainStore.id</p>
                </div>
                <div class="right-foot">
                 <p>08081010203012</p>
                </div>
            </div>
        </div>

        
    <!--akhir buat macam macam top up-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>