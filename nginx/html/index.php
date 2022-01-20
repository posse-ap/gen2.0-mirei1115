<?php
require('db_connect.php');

// データを取得
$stmt = $dbh->query('SELECT * FROM prefectures WHERE id = $id');
$prefectures = $stmt->fetchAll();

// if (isset($_GET['id'])) {
// $id = $_GET['id'];
// $prefectures_value = "SELECT * FROM prefectures WHERE id = $id";
// // PDO::FETCH_UNIQUE??
// $prefectures = $dbh->query($prefectures_value)->fetchAll(PDO::FETCH_ASSOC);
// // }
echo ($prefectures[$id]["prefecture_name"]);

// $id = $_GET['id'];
// $stmt = $db->query("SELECT area FROM areas WHERE id = $id");
// $questions = array();

// $stmtQuestions =  $db->query("SELECT * FROM questions WHERE area_id = $id");
// $questions = $stmtQuestions->fetchAll();

// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
//     $choices_value = "SELECT * FROM choices WHERE prefecture_id = $id";
//     $choices = $dbh->query($choices_value)->fetchAll(POD::FETCH_ASSOC);
// }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> ガチで東京の人しか解けない！#東京の難読地名クイズ</title>
     <link rel="stylesheet" href="./css/reset.css">
     <link rel="stylesheet" href="./css/quizy.css">
     <link rel="icon" href="data:,">
</head>
 <body>
   <script src="./js/quizy.js"></script>
 </body
 </html>