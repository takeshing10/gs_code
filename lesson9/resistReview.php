<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>レビュー登録完了</title>
</head>
<body>
<?php include 'include/header.php';?>
<div id="container">
<?php include 'include/menu.php';?>


<?php
//1. POSTデータ取得
// $name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
// $email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$title = $_POST['title'];
$author = $_POST['author'];
$booksId = $_POST['booksId'];
$rating = $_POST['rating'];
$impression = $_POST['impression'];
$userName = $_SESSION["lid"];

// echo $booksId.'<br>';
// echo $rating.'<br>';
// echo $impression;


// 2. DB接続します
$pdo = db_con(); //


//３．データ登録SQL作成 //「:****」にしているのはSQLインジェクション対策で、危険な記述を書き換える >> bindValue()メソッド
$stmt = $pdo->prepare('INSERT INTO kadai.gs_book_review(booksId,title,author,rating,impression,userName,registDTM,updateDTM) VALUES(:booksId,:title,:author,:rating,:impression,:userName,sysdate(),sysdate())');
$stmt->bindValue(':booksId', $booksId, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':rating', $rating, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':impression', $impression, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userName', $userName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlError($stmt);
}else{
  //５．index.phpへリダイレクト
  // redirect('resist.php');
}
?>

<div id="resist">
  <p>レビューの登録が完了しました。</p>
  <a href="index.php">トップに戻る</a>
</div>

</div>
</body>
</html>


