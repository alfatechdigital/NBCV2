<?php
session_start();
if ( isset($_SESSION['kepribadian_naive_bayes_id']) ) {
    header("location:index.php");
}

$login = 0;
if (isset($_GET['login'])) {
    $login = $_GET['login'];
}

if ($login == 1) {
    $komen = "Silahkan Login Ulang, Cek username dan Password Anda!!";
}

include_once "fungsi.php";
?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
        <title>Login Page</title>
        <link href="images/icon/login.gif" rel="shortcut icon" />
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME ICONS  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--OVERWRITE STYLE-->
        <style>
            .navbar-inverse .navbar-brand{
                color: #fff;
            }
        </style>
    </head>
    <body>
        <!-- HEADER END-->
        <div class="navbar navbar-inverse" style="border-radius:0; margin-bottom:0;">
            <div class="container">
            <span class="navbar-brand" style="font-weight:600; letter-spacing:1px;">Klasifikasi Naïve Bayes</span>
            <ul class="nav navbar-nav navbar-right" style="margin-top:8px;">
                <li><a href="index.php" style="color:#fff;">Beranda</a></li>
                <?php if (empty($_SESSION['kepribadian_naive_bayes_id'])): ?>
                <li><a class="menu-top-active" href="login.php" style="color:#fff;">Masuk</a></li>
                <?php endif; ?>
            </ul>
            </div>
        </div>

        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row" style="align-items: center; display: flex; min-height: 400px;">
                    <div class="col-md-6" style="display: flex; justify-content: center; align-items: center;">
                        <img src="images/siswa.png" alt="Siswa" class="img-responsive" id="login-img" style="max-width: 80%; border-radius: 20px; box-shadow: 0 8px 24px rgba(0,0,0,0.15); opacity: 0; transform: translateX(-40px); transition: all 0.8s cubic-bezier(.77,0,.18,1);"/>
                    </div>
                    <div class="col-md-6">
                        <div id="login-form-box" style="background: #fff; border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.10); padding: 32px 24px; opacity: 0; transform: translateY(40px); transition: all 0.8s cubic-bezier(.77,0,.18,1);">
                            <h4 class="page-head-line" style="margin-bottom: 24px; text-align:center; color:#337ab7; letter-spacing:1px;">Login</h4>
                            <?php
                            if (isset($komen)) {
                                display_error("Login failed");
                            }
                            ?>
                            <form method="post" action="cek-login.php" autocomplete="off">
                                <div class="form-group">
                                    <label for="username"><i class="fa fa-user"></i> User ID</label>
                                    <input type="text" class="form-control" name="username" id="username" required autofocus />
                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="fa fa-lock"></i> Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required />
                                </div>
                                <hr />
                                <button type="submit" class="btn btn-info btn-block" style="font-size:16px; letter-spacing:1px;">
                                    <span class="glyphicon glyphicon-user"></span> &nbsp;Masuk 
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Animasi login -->
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.getElementById('login-img').style.opacity = 1;
                    document.getElementById('login-img').style.transform = 'translateX(0)';
                    document.getElementById('login-form-box').style.opacity = 1;
                    document.getElementById('login-form-box').style.transform = 'translateY(0)';
                }, 200);
            });
        </script>
        <!-- CONTENT-WRAPPER SECTION END-->

        <?php
        include "footer.php";
        ?>
        <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.11.1.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
