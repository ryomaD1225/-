<?php
session_start();
include("functions.php");


$pdo = db_con();

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  $row = $stmt->fetch();

  //mypageの人の名前情報
  $u_name = $row["u_name"];

  //mypageの人のメアド情報
  $u_email = $row["u_email"];
}


//ここからメッセージ表示　user_messege
$stmt = $pdo->prepare("SELECT * FROM user_reply WHERE dep = :u_name");
$stmt->bindValue(":u_name",$u_name,PDO::PARAM_INT);
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="u_detail.php?id='.$result["u_id"].'">';
    $view .= h($result["title"])."[".h($result["indata"])."]";
    $view .= '</a>';
    $view .= '</p>';
  }
}


$stmt1 = $pdo->prepare("SELECT * FROM user_messege WHERE title = :u_name");
$stmt1->bindValue(":u_name",$u_name,PDO::PARAM_INT);
$status1 = $stmt1->execute();


//３．データ表示
$receive ="";
if($status1 ==false){
  queryError($stmt1);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
    $receive .= '<p>';
    $receive .= '<a href="x_detail.php?id='.$result1["u_id"].'">';
    $receive .= h($result1["dep"])."[".h($result1["indata"])."]";
    $receive .= '</a>';
    $receive .= '</p>';
  }
}


?>