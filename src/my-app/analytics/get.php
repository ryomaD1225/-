<?php
include("functions.php");

$pdo = db_con();

// $stmt = $pdo->prepare("SELECT * from button where date > current_timestamp + interval -5 SECOND AND student_id = 1");
// $stmt = $pdo->prepare("SELECT * from button where date > current_timestamp + interval -5 SECOND");
$stmt = $pdo->prepare("SELECT student_id,count(no) as students_num from button group by student_id");
$stmt->execute();
$res = $stmt->fetchAll();
// $result = array_unique($res);
// var_export(array_column($res, 'student_id'));
// $result = array_unique($res);
// echo count ($result);
echo count ($res);
// echo count ($result);
?>
