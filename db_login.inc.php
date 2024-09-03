<?php
function login($database) {
    $server = "localhost";
    $user = "root";
    $password = "";

    $mysqli = new mysqli($server, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "keine DB Verbindung ({mysqli_connect_errno()})" . $mysqli->connect_error;
        exit();
    }
$mysqli->set_charset("utf8");
return $mysqli;
}
?>
