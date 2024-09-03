<?php
require_once("db_login.inc.php");
$mysqli =login("projekte");

/* Abruf der einzelnen Projekte aus der Webdatenbank pojekte und Ausgabe in einer Tabelle, 
   zusätzlicher Bearbeiten Button nach jeder Zeile mit href Link projektupdate.php. 
   Ausgabe der Anzahl der Projekte durch die Anzahl der Zeilen */

$sql = "SELECT * FROM projekt";
$eintrag = $mysqli->query($sql);

if ($eintrag->num_rows > 0) {
	echo "<table border= '1'>
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Startdatum</th>
				<th>Enddatum</th>
				<th>Beschreibung</th>
				<th>Verantwortliche Person</th>
			</tr>";
	while ($row = $eintrag->fetch_assoc()) {
		echo "<tr>
				<td>" . $row["id"]		   ."</td>
				<td>" . $row["name"]		   ."</td>
				<td>" . $row["startdatum"]     ."</td>
				<td>" . $row["enddatum"]	   ."</td>
				<td>" . $row["beschreibung"]   ."</td>
				<td>" . $row["verantwortlich"] ."</td>
				<td><a href='projektupdate.php?id=".$row['id']."'>Bearbeiten</a></td>
				
			</tr>";
	}
		echo "</table>";
	echo "<p>Anzahl der Projekte: " . $eintrag->num_rows . "</p>";
}
?>
