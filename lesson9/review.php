<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php
    $booksId = $_POST['booksId'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publishedDate = $_POST['publishedDate'];
    $description = $_POST['description'];
    $imageLinks = $_POST['imageLinks'];
?>
<?php include 'include/header.php';?>
<div id="container">
<?php include 'include/menu.php';?>

<form method="POST" action="resistReview.php">
<input type="hidden" name="booksId" value="<?=$booksId?>">
<input type="hidden" name="title" value="<?=$title?>">
<input type="hidden" name="author" value="<?=$author?>">

<table id="review">
    <tr class="tableMidashi">
        <td colspan="2">本のプロフィール</td>
    </tr>
    <tr>
        <td width="150">タイトル</td>
        <td>
            <img src="<?=$imageLinks?>" alt="">
            <p><?=$title?></p>
        </td>
    </tr>
    <tr>
        <td>概要</td>
        <td><?=$description?></td>
    </tr>
    <tr>
        <td>著者</td>
        <td><?=$author?></td>
    </tr>
    <tr>
        <td>出版日</td>
        <td><?=$publishedDate?></td>
    </tr>
</table>

<table>
    <tr class="tableMidashi">
        <td colspan="2">この本の評価をしてください</td>
    </tr>
    <tr>
        <td width="150">評価レーティング</td>
        <td>
            <div class="range-group">
                <input type="range" name="rating" min="1" max="5" value="" class="input-range" />
            </div>
        </td>
    </tr>
    <tr>
        <td>コメント</td>
        <td><textarea name="impression" rows="4" cols="40" placeholder="ここに本の感想を記入してください"></textarea></td>
    </tr>
</table>
<div class="textCenter">
    <input type="submit" value="登録する">
</div>
</form>


<table style="margin-top: 50px;">
<tbody>
<tr class="tableMidashi">
    <td colspan="3">他のユーザーのレビュー</td>
</tr>
<tr>
    <th>ユーザ名</th>
    <th>評価レーティング</th>
    <th>コメント</th>
</tr>


<?php
//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_book_review WHERE booksId = :booksId";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':booksId', $booksId, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
  sqlError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  $i = 0;
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $i++;
    switch ($result['rating']) {
      case 0: $rating='&#9734;&#9734;&#9734;&#9734;&#9734;';break;
      case 1: $rating='&#9733;&#9734;&#9734;&#9734;&#9734;';break;
      case 2: $rating='&#9733;&#9733;&#9734;&#9734;&#9734;';break;
      case 3: $rating='&#9733;&#9733;&#9733;&#9734;&#9734;';break;
      case 4: $rating='&#9733;&#9733;&#9733;&#9733;&#9734;';break;
      case 5: $rating='&#9733;&#9733;&#9733;&#9733;&#9733;';break;
    }
    $view .= '<tr>
                <td>'.$result["userName"].'</td>
                <td>'.$rating.'</td>
                <td>'.$result["impression"].'</td>
              </tr>';
  }
}

echo $view;
?>

</tbody>
</table>

</div>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(function() {
  $('.range-group').each(function() {
    for (var i = 0; i < 5; i ++) {
      $(this).append('<a>');
    }
  }); 
  $('.range-group>a').on('click', function() {
     var index = $(this).index();
    $(this).siblings().removeClass('on');
     for (var i = 0; i < index; i++) {
        $(this).parent().find('a').eq(i).addClass('on'); 
     }
    $(this).parent().find('.input-range').attr('value', index);
  });
});
</script>

</body>
</html>



