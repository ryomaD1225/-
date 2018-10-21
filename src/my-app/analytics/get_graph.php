<?php
header('Content-Type: application/json');
include("functions.php");

$pdo = db_con();
$stmt = $pdo->prepare("SELECT student_id, sum(button) as button FROM button where date > CURRENT_TIMESTAMP + INTERVAL 1 HOUR GROUP BY student_id");
// $stmt = $pdo->prepare("SELECT student_id, sum(button) as button FROM button GROUP BY student_id");
$stmt->execute();

$data = array();
foreach ($stmt as $row){
    $data[] = $row;
}
$data = json_encode($data);

print_r ($data);
?>