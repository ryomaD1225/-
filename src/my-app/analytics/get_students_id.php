<?php
include("functions.php");

$pdo = db_con();

// $stmt = $pdo->prepare("SELECT * from button where date > current_timestamp + interval -5 SECOND and student_id");  where date > current_timestamp + interval -5 SECOND
$stmt = $pdo->prepare("SELECT DISTINCT student_id from button where date > current_timestamp + interval -5 SECOND");
$stmt->execute();
// $stmt = $pdo->prepare("SELECT student_id,count(no) as students_num from button group by student_id");
$res = $stmt->fetchAll();
echo count ($res);
// echo count ($result);
?>
