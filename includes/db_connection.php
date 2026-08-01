<?php
$config_file = __DIR__ . '/config.php';
if (!file_exists($config_file)) {
    die('Database configuration file missing. Please copy includes/config.sample.php to includes/config.php and update your database credentials.');
}
$config = require $config_file;

$host = $config['db']['host'] ?? 'localhost';
$db   = $config['db']['name'] ?? 'pos_system';
$user = $config['db']['user'] ?? 'root';
$pass = $config['db']['pass'] ?? ''; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    
} catch (\PDOException $e) {
    
    echo "Database Connection Error: " . $e->getMessage(); 
    exit;
}

?>