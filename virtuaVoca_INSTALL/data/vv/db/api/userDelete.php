<?php
include('../db_connection.php');
$data = $_POST;
$sql = "DELETE FROM `users` WHERE `users`.`username` = '".$data["username"]."'";
$cx->exec( $sql );
