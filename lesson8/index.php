<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザ登録</legend>
    <label>名前：<input type="text" name="name"></label><br>
    <label>ID：<input pattern="^[0-9A-Za-z]+$" type="text" name="loginID"></label><br>
    <label>パスワード：<input type="password" name="loginPW"></label><br>
    <label>権限：
      <select name="authority">
        <option value="0">管理者</option>
        <option value="1">スーパー管理者</option>
      </select>
    </label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
