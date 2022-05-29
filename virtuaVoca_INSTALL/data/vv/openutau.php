<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrapMod.css">
        <link rel="stylesheet" href="assets/global.css">
        <link rel="stylesheet" href="assets/sweetalert/dist/sweetalert2.css">
        <link rel="stylesheet" href="assets/sweetalert/dist/dark.css">
        <link rel="stylesheet" href="assets/lineicons/icon-font/lineicons.css">
        <script src="assets/sweetalert/dist/sweetalert2.js"></script>
        <script src="js/jquery.js"></script>
        <title>Inicio | VirtuaVoca</title>
    </head>
    <body>
        <?php include('web/_firewallWarning.php') ?>
        <?php include('web/_navbar.php') ?>
        <div class="container mt-5" id="container">
            <h1>Landing page</h1>
            <?php include('web/openutau.php') ?>
        </div>
    </body>
</html>

<script src="assets/bootstrap/js/bootstrap.js"></script>
