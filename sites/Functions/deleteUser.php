<?php
include_once("../Includes/loaddata.php");
?>
<html>
<header>
    <?php
    include_once("../Includes/headdata.php");
    ?>
</header>
<body>
<?php
include_once("../Includes/header.php");
?>
<div class="site-container">
    <?php

    if(!isset($_GET["dkey"])) {
        echo "<p style='color:#9e001e'>Fehler bei der Abmeldung! Key fehlt.</p>";
        exit();
    }

    $key = $mysqli->real_escape_string($_GET["dkey"]);
    $resp = $mysqli->query("SELECT id FROM Person Where deleteKey='".$key."'");
    if($resp->num_rows == 0) {
        echo "<p style='color:#9e001e'>Fehler bei der Abmeldung! Person nicht gefunden.</p>" . $key;
        exit();
    }

    $row = $resp->fetch_row();

    $resp2 = $mysqli->query("DELETE FROM Hilfe Where pid=".$row[0]);
    $resp3 = $mysqli->query("DELETE FROM Helfer Where pid=".$row[0]);
    $resp4 = $mysqli->query("DELETE FROM Person Where id=".$row[0]);


    echo "<p style='color:#1a9e00'>Sie wurden erfolgreich Abgemeldet!</p>";
    ?>
    <br>

</div>
</body>
</html>