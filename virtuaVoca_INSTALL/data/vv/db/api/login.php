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
$response["title"] = "Identificación";

// La operación
$sql = "SELECT username, password, role, status FROM users WHERE username = '".$data["user"]."'";
$body["cx"] = include('../db_connection.php');
$body["sql"] = $sql;

// Intenta ejecutarla
try {
    $exec = $cx->query($sql);
    foreach ($exec as $value) {
        $body["user"] = $value[0];
        $hash = $value[1];
        $role = $value[2];
        $status = $value[3];
    }


    //Y si lo consigue
    ini_set("display_errors", 0);
    if ($body["user"] == $data["user"]) {
    ini_set("display_errors", 1);

        // Mira si encajan las contraseñas
        $body["msg"] = "Se encontró el usuario, pero no la contraseña";
        $body["result"] = 1;
        if (password_verify($data["password"], $hash)) {
            $body["msg"] = "Se encontró el usuario y la contraseña";
            $body["result"] = 2;
            session_start();
            $_SESSION["user"] = $body["user"];
            $_SESSION["role"] = $role;
            $_SESSION["status"] = $status;
        }
    } else {
        $body["msg"] = "No se encontró el usuario";
        $body["result"] = 0;
    }
    
} catch (PDOException $e) {
    $body["exec"] = $e;
};

// Devuelve los datos e inicia la sesión
$response["body"] = $body;
echo json_encode($response);