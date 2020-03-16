<?php
/*
 * Form to contact helpers or people seeking help.
*/
include_once("../Includes/loaddata.php");
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
    <div class="container">
        <form id="contact" action="../Functions/sendMail.php" method="post">
            <?php
            session_start();
            $_SESSION['key'] = $CONST_KEY;
            $_SESSION['pid'] = $_GET['pid'];
            $_SESSION['hilfe'] = $_GET['hilfe'];
            if($_GET['hilfe'] == 1) {
            ?>
                <h2>Danke das Sie <?= $_GET['name'] ?>. helfen wollen.</h2>
                <p style="line-height: normal; margin-bottom: 10px;">Schreiben Sie jetzt einen kurzen Text. Die kontaktiere
                    Person wird sich, falls Sie noch Hilfe braucht, direkt via E-Mail melden.</p>
            <?php
            } else {
            ?>
                <h2><?= $_GET['name'] ?>. möchte Ihnen helfen.</h2>
                <p style="line-height: normal; margin-bottom: 10px;">Schreiben Sie jetzt einen kurzen Text. Die kontaktiere
                    Person wird sich, falls Sie noch Hilfe anbieten kann, direkt via E-Mail melden.</p>
            <?php
            }
            ?>
            <fieldset>
                <input placeholder="E-Mail-Adresse" type="email" name="email" id="email" tabindex="1" required>
            </fieldset>
            <fieldset>
                <textarea placeholder="Kurze Nachricht" maxlength="800" name="description" id="description" tabindex="2" required></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Absenden</button>
            </fieldset>
            <p style="color: #a5a5a5; font-size: 8px" class="copyright">Designed by <a style="color: #a5a5a5" href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a></p>
        </form>
    </div>
</div>
</body>
</html>