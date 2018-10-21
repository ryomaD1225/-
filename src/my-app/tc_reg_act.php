<?php
include("functions.php");

$teach_name = $_POST["teach_name"];
$teach_pw = $_POST["teach_pw"];
$img_path = $_FILES["upfile"]["name"];

$pdo = db_con();

if( !isset($_POST["teach_name"]) || $_POST["teach_name"]=="" ||
    !isset($_POST["teach_pw"]) || $_POST["teach_pw"]=="" ||
    !isset($_FILES["upfile"]["name"]) || $_FILES["upfile"]["name"]=="" 
){
    echo('入力に漏れがあります。');
}{
    $stmt = $pdo->prepare("INSERT INTO teacher(teach_id, teach_name, teach_pw, img_path)VALUES(NULL, :a1, :a2, :a3)");  
    $stmt->bindValue(':a1', $teach_name, PDO::PARAM_STR);
    $stmt->bindValue(':a2', $teach_pw, PDO::PARAM_STR);  
    $stmt->bindValue(':a3', $img_path, PDO::PARAM_STR);  
    
    move_uploaded_file($_FILES["upfile"]["tmp_name"],"asset/img/".$img_path);

    $status = $stmt->execute();
    if($status==false){
        queryError($stmt);
        echo('インサートできなかったよ！');
    }else{
        echo('インサートしたよ！');
    };
}
?>