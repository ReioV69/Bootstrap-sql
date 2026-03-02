<?php
$db_server = 'localhost';
$db_andmebaas = 'car_rent';
$db_kasutaja = 'reio';
$db_salasona = 'Passw0rd';

// ühendus andmebaasiga
$yhendus = new mysqli($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);

// ühenduse kontroll
if (!$yhendus) {
    die('Ei saa ühendust andmebaasiga');
}
