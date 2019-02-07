<?php
session_start();
include("exe/funcs.php");
sessChk();
?>

<div id="header">
  <a href="index.php">MY BOOKS REVIEW SITE</a>
  <?php
    if(isset($_SESSION["name"])){
      echo '
        <div class="headerRight">
        <a id="loginName">'.$_SESSION["name"].'さん、こんにちは</a>
        <a href="exe/logout.php" id="logout">[ログアウト]</a>
        </div>';
    }else{
      echo '<a href="login.php?p=login" id="login">[ログイン]</a>';
    }
  ?>  
</div>
