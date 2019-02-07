<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>レビュー一覧</title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php include 'include/header.php';?>
<div id="container">
<?php include 'include/menu.php';?>

<?php
//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$userName = $_SESSION["lid"];
$sql = "SELECT * FROM gs_book_review WHERE userName = :userName";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':userName', $userName, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
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
                <td>'.$i.'</td>
                <td>'.$result["title"].'</td>
                <td>'.$result["author"].'</td>
                <td>'.$rating.'</td>
                <td>'.$result["impression"].'</td>
                <td>'.substr($result["registDTM"],0,16).'</td>
              </tr>';
  }
}
?>


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">


    <form id="search" method="POST" action="#">
  <table>
    <tbody>
    <tr>
      <td>タイトル</td><td><input type="text" name="title"></td>
      
    </tr>
    <tr>
      <td>著者</td><td><input type="text" name="author"></td>
      
    </tr>
<tr>
      <td>レーティング</td><td><label><input type="radio" name="rating" value="1" checked="checked">1</label>
<label><input type="radio" name="rating" value="2">2</label>
<label><input type="radio" name="rating" value="3">3</label>
<label><input type="radio" name="rating" value="4">4</label>
<label><input type="radio" name="rating" value="5">5</label>
</td>
      
    </tr>
    <tr>
      <td>レビュー時期</td><td><input type="date" name="from">　〜　<input type="date" name="to"></td>
      
    </tr>
    <tr>
      <td>レビュー内容（キーワード）</td><td><input type="text" name="review"></td>
      
    </tr>
  </tbody></table>
  <div class="textCenter">
    <input type="submit" value="検索">
    <p>※この検索機能は未実装</p>
  </div>
</form>



    <table>
        <tr>
          <th>No.</th>
          <th>タイトル</th>
          <th>著者</th>
          <th>レーティング</th>
          <th>レビュー内容</th>
          <th>レビュー日時</th>
        </tr>
        <?=$view?>
      </table>
    </div>
</div>
<!-- Main[End] -->


</div>
</body>
</html>
