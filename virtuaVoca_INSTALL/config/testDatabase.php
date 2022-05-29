<?php
$data = $_POST;
$query = "mysql -h ".$data["host"]." -u ".$data["user"]." -p".$data["pass"];

try {
    $url = "mysql:host=".$data["host"];
    $cx = new PDO($url, $data["user"], $data["pass"]);
    $cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $result["title"] = "¡Conexión correcta!";
    $result["comment"] = "La conexión se ha realizado con éxito";
    $result["return"] = 1;
    echo json_encode($result);
} catch (\Throwable $th) {
    $result["title"] = "¡Conexión errónea!";
    $result["comment"] = "Comprueba los datos de conexión";
    $result["return"] = 0;
    echo json_encode($result);
}