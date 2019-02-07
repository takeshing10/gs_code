<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>トップ</title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php include 'include/header.php';?>
<div id="container">
  <form id="search" method="POST" action="exe/insertNewUser.php">
  <table>
  <tbody>
  <tr><td>名前</td><td><input type="text" name="name"></td></tr>
  <tr><td>ID</td><td><input pattern="^[0-9A-Za-z]+$" type="text" name="loginID"></td></tr>
  <tr><td>パスワード</td><td><input type="password" name="loginPW"></td></tr>
  </tbody>
  </table>
  <div class="textCenter">
  <input type="submit" value="新規登録">
  </div>
  </form>
</div>  


</body>
</html>
