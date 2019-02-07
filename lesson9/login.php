<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>トップ</title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
  include 'include/header.php';
  $prm = $_GET["p"];
  if($prm==="nologin"){
    $message = '<p style="
    text-align: center;
    background: #f44336;
    margin-bottom: 15px;
    padding: 5px 0;
    color: white;
  ">レビュー機能を利用する際は、まずはログインしてください</p>';
  }else{
    $message = '';
  }
?>

<div id="container">
  <?=$message?>
  <form id="search" method="POST" action="exe/authentication.php">
  <table>
  <tbody><tr>
  <td>アカウント</td><td><input type="text" name="lid"></td>
  </tr>
  <tr>
  <td>パスワード</td><td><input type="password" name="lpw"></td>
  </tr>
  </tbody></table>
  <div class="textCenter">
  <input type="submit" value="ログイン">
<p style="color:red;	margin-top: 10px;"><?php
?></p>

  </div>
  <a href="resistNewUser.php" id="newResist">新規登録はこちら</a>
  </form>
</div>  


</body>
</html>
