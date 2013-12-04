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

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <style>
            body { padding-top: 70px; padding-bottom: 40px; }
        </style>
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">GAuthify-PHPLogin</a>
                </div>
                <ul class="nav pull-right">
                <?php
                    if(isset($_SESSION['username'])){
                        echo 'Hello, '.$_SESSION['username'].'!';
                        echo '<li><a class="launchLogout" href="#">Logout</a></li>';
                    }
                    else{
                        echo '<li><button type="button" class="launchLogin btn btn-default navbar-btn">Sign in</button></li>';
                    }
                ?>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="loginBar">
                <div class="loginAlert alert alert-info">Enter your email below!</div>
                <form class="loginForm form-inline">
                    <input class="email form-control" type="text" placeholder="Email">
                    <input class="authCode form-control" data-id="" type="text" placeholder="Auth Code">
                     <a class="login btn btn-primary">Sign in</a>
                </form>
            </div>

            <div class="jumbotron">
                <p>You can test this out using the email <code>test@example.com</code></p>
                <p>You'll need the <a href="http://support.google.com/accounts/bin/answer.py?hl=en&answer=1066447" target="_blank">Google Authenticator app <small>(or similar)</small></a> to check this out.</p>
                <p><a data-toggle="modal" data-target="#qrModal">Scan this QR code</a> in Google Authenticator and enter the auth code above.</p>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <h2>Simple GAuthify PHP Login</h2>
                    <p>Relativly simple login system using <a href="https://gauthify.com">GAuthify's API.</a> Checks if user exists in database (disabled for demo) and if so, checks for authentication using a OTP from the Google Authenticator App.</p>
                </div>
            </div>

            <hr>

            <footer>
                <p><a href="http://zackboehm.com">Zack Boehm</a> | <a href="https://twitter.com/zackboehm">@ZackBoehm</a> | <a href="https://github.com/zackboe/GAuthify-PHPLogin/">GitHub</a></p>
            </footer>

        </div> <!-- /container -->

        <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <img src="img/qr.png" class="img-thumbnail img-responsive">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>