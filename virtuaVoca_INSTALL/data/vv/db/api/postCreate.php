<?php
////////////////////////
// API - Crear un post
// ====JSON=========
// title = Titulo del post
// text = Contenido del post
// media = Audio del post (Si tiene)
// author = Autor del post
// type = Tipo del post
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
$response["title"] = "Registro";

// La operación
if (isset($data["media"])) {
    $sql = "INSERT INTO posts(title, text, media, author, type) VALUES ('" . $data["title"] . "', '" . $data["text"] . "', '" . $data["media"] . "', '" . $data["author"] . "', '" . $data["type"] . "')";
} else {
    $sql = "INSERT INTO posts(title, text, author, type) VALUES ('" . $data["title"] . "', '" . $data["text"] . "', '" . $data["author"] . "', '" . $data["type"] . "')";
}

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