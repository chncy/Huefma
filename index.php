<?php
include_once("site/loaddata.php");
?>
<html>
<header>
    <?php
    include_once("site/headdata.php");
    ?>
</header>
<body>
<?php
include_once("site/header.php");
?>
<div class="site-container">
    <?php
    if($_GET["success"] == 1) {
        echo "<p style='color:#1a9e00'>Ihre Nachricht wurde erfolgreich gesendet!</p>";
    }
    ?>
    <br>
    <strong>Information:</strong>
    <p style="margin-top: 2px;">Auf dieser Plattform können sich Menschen in Österreich melden die Hilfe brauchen und Menschen eintragen die Hilfe anbieten.
    Aus Datenschutzgründen, werden keine genauen Daten gesammelt. Öffentlich zugänglich ist nur der Vorname und die Stadt inklusive Postleitzahl.
    Der Kontakt erfolgt über ein Formular, dadurch sind keine E-Mail Adressen offen zugänglich.
    Alle Daten werden nach der Corona Krise von alleine gelöscht.</p>
    <div class="buttongroup">
        <div class="subButtongroup">
            <h2>Für Hilfesuchende:</h2>
            <a href="formHilfe.php"><button class="button1">Ich benötige Hilfe</button></a>
            <br><br>
            <a href="listHelfer.php"><button class="button1">Zur Liste der Helfer</button></a>
        </div>
        <div class="subButtongroup">
            <h2>Für Helfer:</h2>
            <a href="formHelfer.php"><button class="button2">Als Helfer eintragen</button></a>
            <br><br>
            <a href="listHilfe.php"><button class="button2">Zur Liste der Hilfesuchenden</button></a>
        </div>
        <div class="subButtongroup">
            <h2>Allgemein:</h2>
            <a href="delete.php"><button class="button3">Meine Daten löschen</button></a>
        </div>
    </div>
</div>
<?php
include_once("site/footer.php");
?>
</body>
</html>