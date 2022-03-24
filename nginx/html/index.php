<?php
require('db_connect.php');

// データを取得
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // SELECT文を変数に格納
  $sql = "SELECT * FROM prefectures WHERE id = '". $id ."'";
  // SQLステートメントを実行し、結果を変数に格納
  $stmt = $dbh->query($sql);
  $apple = $stmt->fetchAll();
  print_r($apple);
  // foreach文で配列の中身を一行ずつ出力
  // foreach ($stmt as $row) {
  //   // データベースのフィールド名で出力
  //   echo $row['id'].':'.$row['prefecture_name'];
  //   // 改行を入れる
  //   echo '<br>';
  // }

  // questionsSELECT文
  $sqlQuestion = "SELECT * FROM questions WHERE prefecture_id = $id";
  $stmtQuestion = $dbh->query($sqlQuestion);
  // foreach ($stmtQuestion as $rowQuestion) {
  //   echo $rowQuestion['prefecture_id'].':'.$rowQuestion['question_id'].':'.$rowQuestion['choice2'];
  //   echo '<br>';
  // }
  $grape = $stmtQuestion->fetchAll();
  print_r($grape[0]['image']);
  // 各prefecture_idに対して、[]は初めから入ってく
  // データベースの変数を入れて確認してみる

  //choicesSELECT文
  $sqlChoice = "SELECT * FROM choices WHERE question_id = $id";
  $stmtChoice = $dbh->query($sqlChoice);
  $peach = $stmtChoice->fetchAll();
  print_r($peach);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?=$grape['prefectures_id']?></title>
     <link rel="stylesheet" href="./css/reset.css">
     <link rel="stylesheet" href="./css/quizy.css">
</head>
<body>
  for (let i = 0; i< $peach['question_id']; i++) {
    <div class="whole">
      <h1 class="title"><?= $i+1; ?>.この地名はなんて読む？？</h1>
      <img src="./img/<?= $grape[0]['image'] ?>" alt="問題写真">
      <ul>
        <li class="choice_square"><?= $peach[0]['choice_name']; ?></li>
        <li class="choice_square"><?= $peach[1]['choice_name']; ?></li>
        <li class="choice_square"><?= $peach[2]['choice_name']; ?></li>
      </ul>
    </div>
  }
  <!-- <script src="./js/quizy.js"></script> -->
</body>

</html>