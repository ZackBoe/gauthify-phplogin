<?php 
session_start(); 
require_once('config.php');
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">GAuthify-PHPLogin</a>
                    <ul class="nav pull-right">
                        <?php
                        if(isset($_SESSION['username'])){
                            echo 'Hello, '.$_SESSION['username'].'!';
                            echo '<li><a class="launchLogout" href="#">Logout</a></li>';
                        }
                        else{ echo '<li><a class="launchLogin" href="#">Login</a></li>'; }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="loginBar">
                <div class="loginAlert alert alert-info">
                  Enter your email below!
                </div>
                <form class="loginForm form-inline">
                    <input class="email" type="text" class="input-large" placeholder="Email">
                    <input class="authCode" data-id="" type="text" class="input-small" placeholder="Auth Code">
                     <a type="submit" class="login btn">Sign in</a>
                </form>
            </div>

            <!-- Main hero unit for a primary marketing message or call to action -->
            <div class="hero-unit">
                <p>You can test this out using the email <code>test@email.com</code></p>
                <p>You'll need the <a href="http://support.google.com/accounts/bin/answer.py?hl=en&answer=1066447">Google Authenticator app</a> to check this out.</p>
                <p><a href="#qrmodal" data-toggle="modal">Scan this QR code</a> in Google Authenticator and enter the auth code above.</p>

            </div>

            <!-- Example row of columns -->
            <div class="row">
                <div class="span8">
                    <h2>Simple GAuthify PHP Login</h2>
                    <p>Relativly simple login system using <a href="https://gauthify.com">GAuthify's API.</a> Checks if user exists in database (disabled for demo) and if so, checks for authentication using a OTP from the Google Authenticator App.</p>
                </div>
            </div>

            <hr>

            <footer>
                <p><a href="http://zackboehm.com">Zack Boehm</a> | <a href="https://twitter.com/zackboehm">@ZackBoehm | <a href="https://github.com/zackboe/GAuthify-PHPLogin/">GitHub</a></p>
            </footer>

        </div> <!-- /container -->

        <div id="qrmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-body">
            <img src="https://www.gauthify.com/qr/LS3JUZ4TAL2NLT65/">
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>
