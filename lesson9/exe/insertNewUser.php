<?php
session_start();
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
include "funcs.php";
$name = $_POST["name"];
$loginID = $_POST["loginID"];
$loginPW = passwordHash($_POST["loginPW"]);

// echo 'name:'.$name.'<br>';
// echo 'loginid:'.$loginID.'<br>';
// echo 'loginPW:'.$_POST["loginPW"].'<br>';
// echo 'hashPW:'.$loginPW.'<br>';

//2. DB接続します
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg,registDTM)VALUES(:name,:lid,:lpw,0,0,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $loginID, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $loginPW, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["name"]      = $name;
    $_SESSION["lid"]      = $loginID;
    //５．index.phpへリダイレクト
    header("Location: ../index.php");
    exit;
}
?>