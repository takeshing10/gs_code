<?php
//共通に使う関数を記述
function h($a){
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_con(){
    try {
        $pdo = new PDO('mysql:dbname=kadai;charset=utf8;host=localhost','root','');
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());
      }      
}

function redirect($page){
    header("Location: ".$page);
    exit;
}

function sqlError($stmt){ 
    $error = $stmt->errorInfo();
    exit("ErrorSQL:".$error[2]);
  }

function sessChk(){
    if(isset($_SESSION["chk_ssid"])&&$_SESSION["chk_ssid"]===session_id()){ //セッションファイルにchk_ssidデータが存在、かつ、それが現状のセッションIDと一致
        session_regenerate_id(true); // trueは必須！trueを入れないとセッションデータが上書きではなく複製されてしまう。
        $_SESSION["chk_ssid"]=session_Id();
    }else{
        // var_dump(isset($_SESSION["chk_ssid"]));
        // echo session_id();
    }
}

function passwordHash($rawPW){
    $hashPW = password_hash($rawPW,PASSWORD_DEFAULT);
    return $hashPW;
}