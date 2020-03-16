<?php
/*
Loads all important data at the beginning of each page.
*/

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$domainName = $_SERVER['HTTP_HOST'].$_SERVER[REQUEST_URI];
$acturl = $protocol.$domainName;
$domain = "https://www.hüfma.at";
header('Content-Type: text/html; charset=UTF-8');

$CONST_KEY = "";

$date = date("d.m.Y H:i:s");

$_db_host = "";
$_db_datenbank = "";
$_db_username = "";
$_db_passwort = "";

$mysqli = new mysqli($_db_host, $_db_username, $_db_passwort, $_db_datenbank);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}

$mysqli->query("SET NAMES 'utf8'");
$mysqli->query("SET CHARACTER SET 'utf8'");
$mysqli->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");


