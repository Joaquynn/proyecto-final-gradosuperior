<?php
////////////////////////
// API - Leer un usuario
// ====JSON=========
// user = Usuario a leer
// ====RESPUESTA====
// title = Título de la operación
// body = Cuerpo de la operación
//  \____ cx = Conexión a la base de datos
//        - 1 = Conexión correcta
//        - X = Conexión errónea
//  \____ sql = SQL ejecutado
//  \____ exec = Resultado de la ejecución
////////////////////////

// Preparando los datos recibidos
$json = $_POST;
$data = $_POST;

// Poniéndole título a la operación
$response["title"] = "Leer";

// La operación
$sql = "SELECT username, password, role FROM users WHERE username = '".$data["user"]."'";
$body["cx"] = include('../db_connection.php');
$body["sql"] = $sql;

// Intenta ejecutarla
try {
    $exec = $cx->query($sql);
    foreach ($exec as $value) {
        $body["user"] = $value[0];
        $body["role"] = $value[2];
    }
    
} catch (PDOException $e) {
    $body["exec"] = $e;
};

// Devuelve los datos e inicia la sesión
$response["body"] = $body;
echo json_encode($response);