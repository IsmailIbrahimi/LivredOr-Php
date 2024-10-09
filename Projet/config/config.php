<?php

$host = 'localhost';  
$db = 'livre_dor';    
$user = 'root';      
$pass = '';           

$logFile = __DIR__ . '/../logs/db_errors.log';  

try {
    
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";  
    $pdo = new PDO($dsn, $user, $pass);  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    
    file_put_contents($logFile, "[" . date('Y-m-d H:i:s') . "] Erreur de connexion : " . $e->getMessage() . "\n", FILE_APPEND);
    die("Erreur de connexion à la base de données. Veuillez réessayer plus tard.");

}
?>
