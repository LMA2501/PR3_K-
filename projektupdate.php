<?php
require_once("db_login.inc.php");
$conn =login("projekte");

$project_id = $_GET['id']; // ID des zu bearbeitenden Projekts

// SQL-Abfrage, um das Projekt abzurufen
$sql = "SELECT name, startdatum, enddatum, beschreibung, verantwortlich FROM projekt WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $project_id);
$stmt->execute();
$result = $stmt->get_result();

// bestehende Projektinformationen
$pojekte = $result->fetch_assoc();
$stmt->close();
?>

<!-- Erstellung einer HTML Seite für die Änderung der Projektdaten analog zur Eingabe -->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Projekt bearbeiten</title>
</head>
<body>
    <h1>Projekt bearbeiten</h1>
    <form action="projektupdate.php?id=<?php echo $project_id; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($pojekte['name']); ?>" required><br>

        <label for="startdatum">Startdatum:</label>
        <input type="date" id="startdatum" name="startdatum" value="<?php echo $pojekte['startdatum']; ?>" required><br>

        <label for="enddatum">Enddatum:</label>
        <input type="date" id="enddatum" name="enddatum" value="<?php echo $pojekte['enddatum']; ?>" required><br>

        <label for="beschreibung">Beschreibung:</label>
        <textarea id="beschreibung" name="beschreibung" required><?php echo htmlspecialchars($pojekte['beschreibung']); ?></textarea><br>

        <label for="verantwortlich">Verantwortlicher:</label>
        <input type="text" id="verantwortlich" name="verantwortlich" value="<?php echo htmlspecialchars($pojekte['verantwortlich']); ?>" required><br>

        <input type="submit" value="&Auml;nderungen speichern">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $startdatum = $_POST['startdatum'];
    $enddatum = $_POST['enddatum'];
    $beschreibung = $_POST['beschreibung'];
    $verantwortlich = $_POST['verantwortlich'];

    // SQL-Abfrage zur Aktualisierung des Projekts
    $sql = "UPDATE projekt SET name=?, startdatum=?, enddatum=?, beschreibung=?, verantwortlich=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $startdatum, $enddatum, $beschreibung, $verantwortlich, $project_id);

    if ($stmt->execute()) {
        echo "Projekt erfolgreich aktualisiert.";
        header("Location: Komplexe Uebung PR3.php");
    } else {
        echo "Fehler: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
