<?php
$data = $_POST;

try {
    rename("../data/vv", "../data/virtuaVoca_".$data["database"]);
    $folder = '../data/virtuaVoca_'.$data["database"];
    echo "<h6>Completado: Creación de carpeta</h6>";
    
    $user = $data["user"];
    $pass = $data["pass"];
    
    $url = "mysql:host=".$data["host"].";";
    $cx = new PDO($url, $user, $pass);
    $cx->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $file = 'db_connection_base.php';
    $db_connection = file_get_contents($file);
    $db_connection = str_replace("%user%", $data["user"], $db_connection);
    $db_connection = str_replace("%pass%", $data["pass"], $db_connection);
    $db_connection = str_replace("%host%", $data["host"], $db_connection);
    $db_connection = str_replace("%database%", $data["database"], $db_connection);
    file_put_contents("$folder/db/db_connection.php", $db_connection);
    
    
    $archive = new PharData('archive.tar');
    $archive->buildFromDirectory($folder);
    $archive->extractTo('/var/www/html/virtuaVoca_'.$data["database"]);

    echo "<h6>Completado: Conexión con la base de datos</h6>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage()."\n";
    exit;
}

try {
    $sql = "CREATE DATABASE ".$data["database"];
    $cx->exec($sql);
    echo "<h6>Completado: Creación de la base de datos con el nombre de ".$data["database"]." </h6>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage()."\n";
}

try {
    $sql = "USE ".$data["database"];
    $cx->exec($sql);
    $sql = file_get_contents('virtuavoca_body.sql');
    $cx->exec($sql);
    echo "<h6>Completado: Importando estructura base</h6>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $sql = "INSERT INTO `users` (`username`, `password`, `status`, `role`) VALUES ('".$data["adminUser"]."', '".password_hash($data["adminPassword"], PASSWORD_DEFAULT)."', '1', '1');";
    $cx->exec($sql);
    echo "<h6>Completado: Creación del usuario administrador</h6>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage()."\n";
}

if (!($data["testData"])) {
    try {
        $sql = file_get_contents('virtuavoca_data.sql');
        $cx->exec($sql);
        echo "<h6>Completado: Importando datos de ejemplo</h6>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "<h6>Error: Importando datos de ejemplo</h6>";
    }
}

try {
    exec("mv $folder /var/www/html");
    exec('chmod 777 /var/www/html/virtuaVoca_'.$data["database"]);
    exec('chmod 777 /var/www/html/virtuaVoca_'.$data["database"].'/*');
    echo "<h6>Completado: Copia de aplicación en /var/www/html</h6>";
    echo '<button onclick="end()" class="btn btn-primary mx-auto d-block mt-5">Finalizar instalación</button>"';
    rename("../data/virtuaVoca_".$data["database"], "../data/vv");
} catch (\Throwable $th) {
    echo $th;
}