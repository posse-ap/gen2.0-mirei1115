<?php
//データベース接続
$dsn = "mysql:host=db;dbname=webapp_db;charset=utf8mb4;";
$user = "mirei";
$password = "aisu";

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "接続失敗:" . $e->getMessage() . "\n";
    exit();
}
?>