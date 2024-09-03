<?php
require_once("db_login.inc.php");
$mysqli =login("projekte");

$name = $_POST['name'];
$startdatum = $_POST["startdatum"];
$enddatum = $_POST["enddatum"];
$beschreibung = $_POST["beschreibung"];
$verantwortlich = $_POST["verantwortlich"];

$sql = "INSERT INTO projekt (name, startdatum, enddatum, beschreibung, verantwortlich) VALUES ('$name', '$startdatum', '$enddatum', '$beschreibung', '$verantwortlich')";
$mysqli->query($sql);

header("Location: Komplexe Uebung PR3.php") 

?>
