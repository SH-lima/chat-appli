<?php

$user = getenv("DB_USER");
$pass = getenv("DB_PASS");
$host = getenv("DB_HOST");
$dbname=getenv("DB_NAME");
try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (\PDOException $th) {
    echo 'Connexion échouée : ' . $th->getMessage();

}
