<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>検索</title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php include 'include/header.php';?>
<div id="container">
<?php include 'include/googleBooksAPI.php';?>
<?php include 'include/menu.php';?>
<?php include 'include/search.php';?>

<p><?=$totalItems?>件の検索結果が表示されます</p>
<table>
   <tr>
      <th>No</th>
      <th>表紙</th>
      <th>タイトル</th>
      <th width="70">著者</th>
      <th width="100">出版日</th>
      <th>レビュー</th>
   </tr>
   <?=$tableTags?>
</table>

</div>

</body>
</html>
