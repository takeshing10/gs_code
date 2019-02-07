<div id="menu">
  <a href="index.php">本を検索してレビューを書く</a>
  <?php
    if(isset($_SESSION["chk_ssid"])){
      echo '<a href="select.php">マイレビューを見る</a>';
    }else{
      echo '<a href="login.php?p=nologin">マイレビューを見る</a>';
    }
  ?>
  </div>
