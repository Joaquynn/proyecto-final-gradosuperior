<?php
    session_start();
    if (!isset($_FILES['file']['name'])) {
        $response["result"] = true;
        $response["ext"] = null;
        echo json_encode($response);
        exit;
    }
    $allowed = array('mp3', 'wav', 'ogg');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        if (!in_array($ext, $allowed)) {
            $response["result"] = false;
            $response["ext"] = $ext;
            echo json_encode($response);
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/(' . $_SESSION["user"] . ")-" . $_FILES['file']['name']);
            $response["result"] = true;
            $response["ext"] = $ext;
            $response["media"] = "(" . $_SESSION["user"] . ")-" . $_FILES['file']['name'];
            echo json_encode($response);
        }
    }

?>
