<?php
require("./db_connect.php");

$id = $_GET['id'];
$sql = "SELECT * FROM prefectures WHERE id = $id ";
$stmt = $dbh -> query($sql);
$prefectures = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($prefectures);

$sqlQuestions = "SELECT * FROM questions WHERE prefecture_id = $id ";
$stmtQuestions = $dbh -> query($sqlQuestions);
$questions = $stmtQuestions->fetchAll(PDO::FETCH_ASSOC);
// print_r($questions);

$sqlChoices = "SELECT * FROM choices WHERE question_id = $id ";
$stmtChoices = $dbh -> query($sqlChoices);
$choices = $stmtChoices->fetchAll(PDO::FETCH_ASSOC);
print_r($choices);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?= $prefectures[0]['prefecture_name'] ?>
    </title>
    <link rel="stylesheet" href="./static/css/reset.css">
    <link rel="stylesheet" href="./static/css/quizy.css">
</head>
<body>
  <!-- for (let $i= 0; $i < $questions['prefecture_id']; $i++) {
    <div class="whole">
      <h1 class="title"><?= $i+1; ?>.この地名はなんて読む？？</h1>
      <img src="./img/<?= $grape[0]['image'] ?>" alt="問題写真">
      <ul>
        <li class="choice_square"><?= $peach[0]['choice_name']; ?></li>
        <li class="choice_square"><?= $peach[1]['choice_name']; ?></li>
        <li class="choice_square"><?= $peach[2]['choice_name']; ?></li>
      </ul>
    </div>
  } -->
</body>