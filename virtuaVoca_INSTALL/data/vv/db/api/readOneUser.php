<?php
////////////////////////
// API - Login
// ====JSON=========
// user = Usuario a identificar
// password = Contraseña SIN HASHEAR
// ====RESPUESTA====
// title = Título de la operación
// body = Cuerpo de la operación
//  \____ cx = Conexión a la base de datos
//        - 1 = Conexión correcta
//        - X = Conexión errónea
//  \____ sql = SQL ejecutado
//  \____ user = Usuario encontrado en la base de datos
//  \____ msg = Mensaje de información de la consulta
//  \____ result = Resultado numeral de la operación
//        - 0 = No se ha encontrado ni el nombre ni la contraseña
//        - 1 = Se ha encontrado el nombre de usuario, pero no la contraseña
//        - 2 = Se han encontrado los dos juntos
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