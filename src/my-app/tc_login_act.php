<?php
session_start();
include("functions.php");

$teach_id = $_POST["teach_id"];
$teach_pw = $_POST["teach_pw"];

$pdo = db_con();

if(
    !isset($_POST["teach_id"]) || $_POST["teach_id"]=="" ||
    !isset($_POST["teach_pw"]) || $_POST["teach_pw"]==""
){
    echo('false');
}else{
    //対象レコードがあるか確認
    $stmt = $pdo->prepare("SELECT * FROM teacher WHERE teach_id = :teach_id AND teach_pw = :teach_pw");
    $stmt->bindValue(':teach_id', $teach_id);
    $stmt->bindValue(':teach_pw', $teach_pw);
    $res = $stmt->execute();
    //SQL実行時にエラーがある場合
    if($res==false){
        $error = $stmt->errorInfo();
    }{ //SQL実行が成功した場合
        $val = $stmt->fetch();//1レコードだけ取得する
        $_SESSION['teach_id'] = $val['teach_id'];
        $_SESSION["chk_ssid"] = session_id();
        //レコードがあるか確認
        if($val["teach_id"] == ""){ //対象レコードがなかった時
            // ここでechoすると更新したときに困るので、名前もローカルストレージに格納して、JSで表示した方がいい
            header("Location: index.php");
        }else{ //対象レコードを取得できた場合
            header("Location: analytics/index2.php");
    };
    }
}
?>