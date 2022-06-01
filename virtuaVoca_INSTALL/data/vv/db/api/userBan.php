<?php
////////////////////////
// API - Banear a un usuario
// ====JSON=========
// username = Usuario a banear
////////////////////////

ini_set("display_errors", 1);
include('../db_connection.php');
$data = $_POST;
$sql = "UPDATE `users` SET `status` = '2' WHERE `users`.`username` = '".$data["username"]."'";
$cx->exec( $sql );