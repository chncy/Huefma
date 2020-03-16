<?php
/*
Form to register for helpe.
*/
include_once("../Includes/loaddata.php");

$succes = 0;
if($_POST["send"]) {
    $firstname = $mysqli->real_escape_string($_POST['firstname']);
    $lastname = $mysqli->real_escape_string($_POST['lastname']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $stadt = $mysqli->real_escape_string($_POST['stadt']);
    $plz = $mysqli->real_escape_string($_POST['plz']);
    $desc = $mysqli->real_escape_string($_POST['desc']);
    $deleteKey = md5(uniqid(rand(), true));

    $resp = $mysqli->query("SELECT p.vorname, p.nachname, p.email, p.deleteKey FROM Person p Where email='".$email."'");

    if($resp->num_rows == 0) {
        $resp1 = $mysqli->query("INSERT INTO Person (vorname,nachname,stadt,plz,email,deleteKey) VALUES ('$firstname','$lastname','$stadt','$plz','$email','$deleteKey')");
        $resp2 = $mysqli->query("INSERT INTO Hilfe (pid,beschreibung) VALUES (".$mysqli->insert_id.",'$desc')");
        $succes = 1;
    } else {
        $succes = 2;
    }
}

?>
<html>
<header>
    <?php
    include_once("../Includes/headdata.php");
    ?>
    <link rel="stylesheet" href="../../css/contact.css">
</header>
<body>
<?php
include_once("../Includes/header.php");
?>
<div class="site-container">
    <?php
    if($succes == 0) {
    ?>
    <div class="container">
        <form id="contact" action="formHelp.php" method="post">
            <h3>Ich brauche Hilfe</h3>
            <fieldset>
                <input placeholder="Vorname" id="firstname" name="firstname" type="text" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="Nachname (Erster Buchstabe)" id="lastname" name="lastname" maxlength="1" type="text" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="E-Mail-Adresse (wird nicht öffentlich angezeigt)" type="email" id="email" name="email" tabindex="2" required>
            </fieldset>
            <fieldset>
                <input placeholder="Stadt" id="stadt" name="stadt" type="text" tabindex="3" required>
            </fieldset>
            <fieldset>
                <input placeholder="Postleitzahl" id="plz" name="plz" type="text" maxlength="4" tabindex="4" required>
            </fieldset>
            <fieldset>
                <textarea placeholder="Kurze Beschreibung was benötigt wird." id="desc" name="desc" maxlength="800" tabindex="5" required></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Speichern</button>
            </fieldset>
            <p style="color: #a5a5a5; font-size: 8px" class="copyright">Designed by <a style="color: #a5a5a5" href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a></p>
            <input type="hidden" value="1" id="send" name="send">
        </form>
    </div>
        <?php
    } else if($succes == 1) { ?>
        <p style='color:#1a9e00'>Sie haben sich erfolgreich eingetragen.</p>
        <?php
    } else {
        ?>
        <p style='color:#9e0100'>Diese E-Mail wurde schon angemeldet.</p>
    <?php
    }
    ?>
</div>
</body>
</html>