<?php
////////////////////////
// API - Eliminar a un usuario
// ====JSON=========
// username = Usuario a eliminar
////////////////////////

include('../db_connection.php');
$data = $_POST;
$sql = "DELETE FROM `users` WHERE `users`.`username` = '".$data["username"]."'";
$cx->exec( $sql );
