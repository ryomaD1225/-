<?php
header('Content-Type: application/json');
include("functions.php");

$pdo = db_con();
$stmt = $pdo->prepare("SELECT count(st_id) as st_id from student");
$stmt->execute();

$data = array();
foreach ($stmt as $row){
    $data[] = $row;
}
$data = json_encode($data);

print ($data);
?>