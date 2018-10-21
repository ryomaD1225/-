<?php
	include_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?php the_title();?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/asset/css/styles.css">
	<link rel="stylesheet" type="text/css" href="/asset/css/<?php echo $slug;?>_styles.css">
</head>
<body class="<?php echo $slug;?>">
	<div class="wrapAll">
