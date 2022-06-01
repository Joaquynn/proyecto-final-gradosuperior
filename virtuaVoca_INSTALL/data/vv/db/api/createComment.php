<?php
////////////////////////
// API - Crear comentario
// ====JSON=========
// author = Autor del comentario
// text = Texto
// post_id = ID del post
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


// Poniéndole título a la operación
$response["title"] = "Crear comentario";

// La operación
$sql = "INSERT INTO comments(author, text, post_id) VALUES ('" . $data["author"] . "', '" . $data["text"] . "', '" . $data["post_id"] .  "')";

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