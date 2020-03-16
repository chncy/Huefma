<?php
/*
 * Script for sending an email
*/
include_once("../Includes/loaddata.php");
session_start();
if($_SESSION['key'] != $CONST_KEY) {
    header("Location: ".$domain."/index.php?error=1");
    exit();
}
$_SESSION['key'] = "?";
session_destroy();

$pid = $mysqli->real_escape_string($_SESSION['pid']);
$_SESSION['pid'] = 0;
$email = $mysqli->real_escape_string($_POST['email']);
$description = nl2br(htmlspecialchars($_POST['description']));

$description = str_replace("<br />", "", $description);


$resp = $mysqli->query("SELECT p.vorname, p.nachname, p.email, p.deleteKey FROM Person p Where id=".$pid);
if($resp->num_rows == 0) {
    header("Location: ".$domain."/index.php?error=2");
    exit();
}
$row = $resp->fetch_row();

$empfaenger = $row[2];
$betreff = 'Hüf-Ma Anfrage';
$nachricht = "";

if($_SESSION['hilfe'] == 1) {
    $nachricht .= 'Hallo '.$row[0].' '.$row[1].'.,'."\r\n".'jemand möchte von Ihnen Hilfe und hat folgende Nachricht für Sie:'."\r\n";
    $nachricht .= '---------------------------------' . "\r\n";
} else {
    $nachricht .= 'Hallo '.$row[0].' '.$row[1].'.,'."\r\n".'jemand möchte Ihnen helfen und hat folgende Nachricht für Sie:'."\r\n";
    $nachricht .= '---------------------------------' . "\r\n";
}

$nachricht .= $description . "\r\n";
$nachricht .= '---------------------------------' . "\r\n";
if($_SESSION['hilfe'] == 1) {
    $nachricht .= 'Sie können auf diese E-Mail direkt antworten, falls Sie Hilfe leisten wollen.' . "\r\n";
} else {
    $nachricht .= 'Sie können auf diese E-Mail direkt antworten, falls Sie die Hilfe annehmen wollen.' . "\r\n";
}
$nachricht .= 'Falls Sie sich aus der Liste austragen wollen, klicken Sie auf folgenden Link:' . "\r\n";
$nachricht .= $domain . "/sites/Functions/deleteUser.php?dkey=" . $row[3];

$headers[] = "Content-type: text/plain; charset=utf-8";

$header = 'From: helfen@hüfma.at' . "\r\n" .
    'Reply-To: '.$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion() .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-type: text/plain; charset=utf-8' . "\r\n";


mail($empfaenger, $betreff, $nachricht, $header);

header("Location: ".$domain."/index.php?success=1");