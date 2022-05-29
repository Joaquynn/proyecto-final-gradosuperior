<?php
try {
    $database = "%database%";
    $user = "%user%";
    $pass = "%pass%";

    $url = "mysql:host=%host%;dbname=$database";
    $cx = new PDO($url, $user, $pass);

    # generate exceptions on error
    $cx->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $e) {
    return "Error: " . $e->getMessage();
}
