<?php
include_once("config.php");

//SQL処理エラー
function queryError($stmt){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}
/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
// function chkssid(){
//   if(!isset($_SESSION["chk_ssid"]) ||
//     $_SESSION["chk_ssid"] != session_id()
//   ){
//     exit("Login error.");
//   }
// }

function the_title(){
  global $title;
  echo $title;
}