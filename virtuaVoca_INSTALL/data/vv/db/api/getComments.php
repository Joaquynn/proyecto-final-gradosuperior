<?php
////////////////////////
// API - Conseguir comentarios de un post
// ====JSON=========
// id = ID del post
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
$data = $_POST;

// Poniéndole título a la operación
$response["title"] = "Conseguir comentarios";

// La operación
$sql = "SELECT * FROM comments WHERE post_id = '".$data["id"]."'";
$body["cx"] = include('../db_connection.php');
$body["sql"] = $sql;

// Intenta ejecutarla
$keycode = 0;
try {
    $exec = $cx->query($sql);
    foreach ($exec as $exec2) {
        foreach ($exec2 as $key => $value) {
            if (!is_numeric($key)) {
                $comments[$keycode][$key] = $value;
            }
        }
        $keycode++;
    }
} catch (PDOException $e) {
    $body["exec"] = $e;
};

// Devuelve los datos e inicia la sesión
$response["body"] = $body;
echo json_encode($comments);