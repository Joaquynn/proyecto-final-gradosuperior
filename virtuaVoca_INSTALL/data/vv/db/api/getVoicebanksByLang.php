<?php
////////////////////////
// API - Conseguir bancos de voz por idioma
// ====JSON=========
// lang = Idioma de la voz
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
$response["title"] = "Leer post";

// La operación
$sql = "SELECT * FROM voicebanks WHERE lang = '".$data["lang"]."' ORDER BY date DESC";
$body["cx"] = include('../db_connection.php');
$body["sql"] = $sql;

// Intenta ejecutarla
$keycode = 0;
try {
    $exec = $cx->query($sql);
    foreach ($exec as $exec2) {
        foreach ($exec2 as $key => $value) {
            if (!is_numeric($key)) {
                $posts[$keycode][$key] = $value;
            }
        }
        $keycode++;
    }
} catch (PDOException $e) {
    $body["exec"] = $e;
};

// Devuelve los datos e inicia la sesión
$response["body"] = $body;
echo json_encode($posts);