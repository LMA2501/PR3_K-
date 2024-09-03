<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF8" />
    <meta name="Martin Lang" content="KUE_PR3" />
    <title> Projekte </title>
</head>
<body>

<!-- Erstellung einer HTML Seite für die Eingabe der Projektdaten und abspeichern mittels save.php -->

<h1>Projekte</h1>

    <h2>Projektdaten eingeben:</h2>

    <form action="save.php" method="post"> 
        <label for="name">Projektname:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="Startdatum">Startdatum:</label>
        <input type="date" id="startdatum" name="startdatum" required><br><br>

        <label for="Enddatum">Enddatum:</label>
        <input type="date" id="enddatum" name="enddatum" required><br><br>

        <label for="beschreibung">Beschreibung des Projekts:</label>
        <textarea id="beschreibung" name="beschreibung" cols="35" rows="4" placeholder="Hier Projektbeschreibung einfügen" required></textarea><br><br>

        <label for="verantwortlich">Verantwortliche Person:</label>
        <input type="text" id="verantwortlich" name="verantwortlich" required><br><br>

        <button type="submit" value="speichern">Speichern</button>
    </form>

    <!-- Abruf und Anzeige der Projektliste mittels projektliste.php -->

    <h2>Projekte anzeigen:</h2>

    <div id="projektliste">
        <?php include 'projektliste.php'; ?>
    </div>
 
    </form>

</body>
</html>
