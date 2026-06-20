<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'stern_portal';

$dbc = mysqli_connect($host, $user, $password, $dbname);

if (!$dbc) {
    die('Greška pri spajanju na bazu: ' . mysqli_connect_error());
}

mysqli_set_charset($dbc, 'utf8mb4');
?>
