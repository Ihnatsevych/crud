<?php

$host = 'localhost';
$db = 'garage';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
} catch (PDOException $e){
    echo 'DB error'.$e->getMessage();
}
