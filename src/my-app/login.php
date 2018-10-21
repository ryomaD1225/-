<?php
include("functions.php");

$student_id = $_POST["student_id"];

$pdo = db_con();

if(
    !isset($_POST["student_id"]) || $_POST["student_id"]==""
){
    echo('false');
}else{
    //対象レコードがあるか確認
    $stmt = $pdo->prepare("SELECT * FROM student WHERE st_id = :student_id");
    $stmt->bindValue(':student_id', $student_id);
    $res = $stmt->execute();
    //SQL実行時にエラーがある場合
    if($res==false){
        $error = $stmt->errorInfo();
        echo($error);
    }{ //SQL実行が成功した場合
        $val = $stmt->fetch();//1レコードだけ取得する
        //レコードがあるか確認
        if($val["st_id"] != "" ){ //対象レコードがなかった時
            // ここでechoすると更新したときに困るので、名前もローカルストレージに格納して、JSで表示した方がいい
            echo($val["name"]);
        }else{ //対象レコードを取得できた場合
            echo('false');
    };
    }
}
?>