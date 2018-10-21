<?php
include("functions.php");

$name = $_POST["name"];
$class_id = $_POST["class_id"];

$pdo = db_con();

if( !isset($_POST["name"]) || $_POST["name"]=="" ||
    !isset($_POST["class_id"]) || $_POST["class_id"]==""
){
    echo('名前とクラスIDを入力してください。');
}{
    $stmt = $pdo->prepare("INSERT INTO student(st_id, name, class_id)VALUES(NULL, :a1, :a2)");  
    $stmt->bindValue(':a1', $name, PDO::PARAM_STR);  
    $stmt->bindValue(':a2', $class_id, PDO::PARAM_STR);  
    $status = $stmt->execute();
    if($status==false){
        queryError($stmt);
        echo('インサートできなかったよ！');
    }else{
        echo('インサートしたよ！');
    };
}
?>