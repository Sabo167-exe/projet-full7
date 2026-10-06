<?php
$config = require __DIR__ . '/../config/secrets.php';



$host   = $config['db']['host'];
$dbname = $config['db']['dbname'];
$user   = $config['db']['user'];
$pass   = $config['db']['pass'];

try {
    $pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>