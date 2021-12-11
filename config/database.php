<?php
$severname = "localhost";
$username = "root";
$password = "";
$databasename = "app";

$GLOBALS['conn'] = new mysqli($severname, $username, $password, $databasename);

mysqli_set_charset($GLOBALS['conn'], 'utf8');

if ($GLOBALS['conn']->connect_error) {
    die("Connection failed: " . $GLOBALS['conn']->connect_error);
}
