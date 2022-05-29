<?php
include('../db_connection.php');
$data = $_POST;
if ($data["column"] == "password") {
    $sql = "UPDATE `users` SET `".$data["column"]."` = '".password_hash($data["value"], PASSWORD_DEFAULT)."' WHERE `users`.`username` = '".$data["username"]."'";
} else {
    $sql = "UPDATE `users` SET `".$data["column"]."` = '".$data["value"]."' WHERE `users`.`username` = '".$data["username"]."'";
}
$cx->exec( $sql );