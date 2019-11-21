<?php
$host = "localhost";
$port = 3306;
$socket = "";
$user = "admin";
$password = "Pa11word";
$db = "inventory";
$charset = 'utf8mb4';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;charset=$charset";

//Create connection
try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "Connected successfully";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>
