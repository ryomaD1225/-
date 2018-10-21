<?php
define("DB_NAME",'sc_project');
define("DSN",'mysql:dbname='.DB_NAME.';charset=utf8;host=mysql');
define("DB_USER",'root');
define("DB_PASSWORD",'mysql');
define("INTERVAL_SECOND",5);

//DB接続関数（PDO）
function db_con(){
  try {
    $pdo = new PDO(DSN,DB_USER,DB_PASSWORD,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

$pdo = db_con();