<?php
include_once("site/loaddata.php");

$sucess = 0;

if(isset($_POST['email'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $resp = $mysqli->query("SELECT p.vorname, p.nachname, p.email, p.deleteKey FROM Person p Where email='".$email."'");

    if($resp->num_rows == 0) {
        $error = "Fehler! Keine Daten gefunden mit dieser E-Mail Adresse.";
    } else {
        $row = $resp->fetch_row();
        $empfaenger = $row[2];
        $betreff = 'Hüf-Ma Daten Löschung';
        $nachricht = "";
        $nachricht .= 'Hallo '.$row[0].' '.$row[1].'.,'."\r\n";
        $nachricht .= 'Damit Ihre Daten gelöscht werden, klicken Sie auf folgenden Link:' . "\r\n";
        $nachricht .= $domain . "/abmelden.php?dkey=" . $row[3];


        $header = 'From: helfen@hüfma.at' . "\r\n" .
            'Reply-To: helfen@hüfma.at' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($empfaenger, $betreff, $nachricht, $header);
        $error = "Erolgreich! Sie haben eine E-Mail bekommen mit dem Link zur Löschung der Daten.";
        $sucess = 1;
    }
}

?>
<html>
<header>
    <?php
    include_once("site/headdata.php");
    ?>
    <link rel="stylesheet" href="css/contact.css">
</header>
<body>
<?php
include_once("site/header.php");
?>
<div class="site-container">
    <div class="container">
        <form id="contact" action="delete.php" method="post">
            <h2>Löschen meiner Daten</h2>
            <p style="line-height: normal; margin-bottom: 10px;">Bitte geben Sie Ihre eingetragene E-Mail Adresse ein. Sie bekommen eine E-Mail zugeschickt, mit der Sie ihre Daten löschen können.</p>
            <fieldset>
                <input placeholder="E-Mail-Adresse" type="email" name="email" id="email" tabindex="1" required>
            </fieldset>
            <fieldset>
                <p style="line-height: normal; margin-bottom: 10px;"><?=$error?></p>
                <?php
                if($sucess == 1) {
                    echo '<a href="index.php"><button class="button1">Zurück zur Statseite</button></a>';
                } else {
                    echo '<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Löschen</button>';
                }
                ?>

            </fieldset>
            <p style="color: #a5a5a5; font-size: 8px" class="copyright">Designed by <a style="color: #a5a5a5" href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a></p>
        </form>
    </div>
</div>
</body>
</html>