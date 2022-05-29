<?php
////////////////////////
// API - Registro
// ====JSON=========
// user = Usuario a registrar
// password = Contraseña SIN HASHEAR
// ====RESPUESTA====
// title = Título de la operación
// body = Cuerpo de la operación
//  \____ cx = Conexión a la base de datos (1 es correcta y otra cosa es errónea )
//        - 1 = Conexión correcta
//        - X = Conexión errónea
//  \____ sql = SQL ejecutado
//  \____ exec = Resultado de la ejecución
//        - 1 = Resultado correcto
//        - 0 = Resultado erróneo
////////////////////////

// Preparando los datos recibidos
$data = $_POST;
$data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

// Poniéndole título a la operación
$response["title"] = "Registro";

// La operación
$sql = "INSERT INTO users(username, password) VALUES ('".$data["user"]."', '".$data["password"]."')";
$body["cx"] = include('../db_connection.php');
$body["sql"] = $sql;

// Intenta ejecutarla
try {
    $cx->exec( $sql );
    $body["exec"] = 1;
} catch (PDOException $e) {
    $body["exec"] = 0;
};

// Devuelve los datos
$response["body"] = $body;
echo json_encode($response);