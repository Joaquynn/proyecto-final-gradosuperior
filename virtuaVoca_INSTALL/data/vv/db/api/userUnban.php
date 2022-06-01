<?php
////////////////////////
// API - Desbanear a un usuario
// ====JSON=========
// username = Usuario a desbanear
////////////////////////

ini_set("display_errors", 1);
include('../db_connection.php');
$data = $_POST;
$sql = "UPDATE `users` SET `status` = '1' WHERE `users`.`username` = '".$data["username"]."'";
$cx->exec( $sql );