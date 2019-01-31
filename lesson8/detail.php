<?php
$id = $_GET["id"];
// echo $id;

include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id =:id"); //【注意】where句に直接変数を入れてはいけない!!
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    // 先頭の一行だけ取り出す
    $row = $stmt->fetch();
  }

// var_dump($row);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザ更新</title>
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
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
    <label>ID：<input pattern="^[0-9A-Za-z]+$" type="text" name="loginID" value="<?=$row["lid"]?>"></label><br>
    <label>パスワード：<input type="password" name="loginPW" value="<?=$row["lpw"]?>"></label><br>
    <label>権限：
      <select name="authority">
        <option value="0">管理者</option>
        <option value="1" <?php if($row["kanri_flg"]==1){echo 'selected';}?>>スーパー管理者</option>
      </select>
    </label><br>
    <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="更新">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
