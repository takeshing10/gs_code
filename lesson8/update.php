<?php
//-------------------------------------
// insert.phpからコピーしてきた
//-------------------------------------
$name = $_POST["name"];
$loginID = $_POST["loginID"];
$loginPW = $_POST["loginPW"];
$authority = $_POST["authority"];


//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_user_table SET name=:name,lid=:lid,lpw=:lpw,kanri_flg=:kanri_flg,updateDTM=sysdate() WHERE id=:id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $loginID, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $loginPW, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $authority, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

echo $sql;

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit;
}


?>
