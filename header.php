<?php
include './backend/config.php';
session_start();

if (isset($_COOKIE['login'])) {
    $_SESSION['cat'] = $_COOKIE['cat'];
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['uid'] = $_COOKIE['uid'];
    if (isset($_COOKIE['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
    }
    if (isset($_COOKIE['imgurl'])) {
        $_SESSION['imgurl'] = $_COOKIE['imgurl'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'
            id='bootstrap-css'>
        <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' />
        <meta charset='UTF-8'>
        <script src='https://kit.fontawesome.com/573e62a9c5.js' crossorigin='anonymous'></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css'
            integrity='sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We' crossorigin='anonymous'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Poppins&display=swap" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AQI index of Nepal | </title>
        <link rel="stylesheet" href="./assets/css/main.css">
        <link rel="stylesheet" href="./assets/styles/header.css">
        <link rel="icon" href="./assets/img/weather.png">
        <style>
        #main-body {
            display: none;
        }

        .loader {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            width: 300px;
            height: 300px;
        }

        .loader .img-div {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 300px;
            height: 300px;
        }

        .loader .img-div img {
            border-radius: 5px;
            width: 100%;
        }

        .offline {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: white;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            display: none;
        }

        .offline .box {
            height: 100px;
            width: 100px;
        }

        .offline .box img {
            width: 100%;
        }

        .offline samp {
            color: #132c33;
        }
        </style>
        <script>
        window.onload = function() {
            document.querySelector('.loader').style.display = "none";
            document.querySelector('#main-body').style.display = "block";
        }
        </script>
    </head>

    <body>
        <div class="offline" id="offlinebox">
            <div class="box">
                <img src="./assets/img/nointernet.gif" alt="">
            </div>
            <samp>Opps ! you are offline !</samp>
            <samp>Check your internet Connection !</samp>
        </div>
        <div class="scrolltotop">
            <i class="fas fa-chevron-up"></i>
        </div>
        <div class="loader">
            <div class="img-div">
                <img src="./assets/img/loader.gif" alt="">
            </div>
        </div>
        <div id="main-body">

            <div class="scrolltotop">
                <i class="fas fa-chevron-up"></i>
            </div>

            <div id='hoverarea' class="hoverarea">
                <h4><span id="d">__________ </span> , <span id="p">___________</span></h4>
                <div class="box">
                    <h3>Air quality : <span id="aqi">______</span></h3>
                    <p>Carbon Monoxide : <span id="co" style="font-weight: bold; color: #132c33">00</span>
                        μg/m<sup>3</sup>
                    </p>
                    <p>Nitrogen Monoxide : <span id="no" style="font-weight: bold; color: #132c33">00</span>
                        μg/m<sup>3</sup>
                    </p>
                    <p>Nitrogen dioxide : <span id="nd" style="font-weight: bold; color: #132c33">00</span>
                        μg/m<sup>3</sup>
                    </p>
                    <p>Ozone : <span id="o" style="font-weight: bold; color: #132c33">00</span> μg/m<sup>3</sup></p>
                    <p>Sulpher Dioxide : <span id="sd" style="font-weight: bold; color: #132c33">00</span>
                        μg/m<sup>3</sup>
                    </p>
                    <p>Fine Particles : <span id="fp" style="font-weight: bold; color: #132c33">00</span>
                        μg/m<sup>3</sup>
                    </p>
                    <p>Coarse Particulate : <span id="cp" style="font-weight: bold; color: #132c33">00</span>
                        μg/m<sup>3</sup>
                    <p>Ammonia : <span id="am" style="font-weight: bold; color: #132c33">00</span> μg/m<sup>3</sup></p>
                    <p id="hovererror" style="color: crimson; text-align: center;margin-top: 10px; font-size: 20px;">
                    </p>
                </div>
            </div>

            <nav>
                <div class="nav-div">
                    <div class="nav-box">
                        <div class="right-logo">
                            <a href="<?php echo $localhost; ?>"> AQI INDEX OF NEPAL</a>
                        </div>
                        <div class="left-navs">
                            <div class="bar" id="navbtn">
                                <div></div>
                                <div id="middle"></div>
                                <div></div>
                            </div>
                            <div class="barclose" id="navbtnclose">
                                <div></div>
                                <div></div>
                            </div>
                            <div class="tabs">
                                <a href="<?php echo $localhost; ?>">Home</a>
                                <a href="<?php echo $localhost; ?>documentation">Documentation</a>
                                <a href="<?php echo $localhost; ?>about"> About </a>
                                <a href="<?php echo $localhost; ?>contactus"> Contact Us </a>
                                <?php if (
                                    isset($_COOKIE['login']) ||
                                    isset($_SESSION['login'])
                                ) { ?>
                                <a href="<?php echo $localhost; ?>api">get API </a>
                                <a href="<?php echo $localhost; ?>complain">Complain </a>
                                <a href="<?php echo $localhost; ?>systems/logout" onclick="gmailLogout();"> Logout </a>
                                <?php } else { ?>
                                <a href="<?php echo $localhost; ?>systems/signup"> Signup </a>
                                <a href="<?php echo $localhost; ?>systems/"> Login </a>
                                <?php } ?>
                            </div>
                            <?php if (isset($_SESSION['imgurl'])) { ?>
                            <div style="width: 30px; height: 30px; margin-left : 20px; margin-right: 10px;">
                                <img draggable="false" width="100%" src="<?php echo $_SESSION[
                                    'imgurl'
                                ]; ?>" class="rounded-circle" alt="">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="scrollline">
                    <div id="scrolled"></div>
                </div>

            </nav>