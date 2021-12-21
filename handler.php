<?php

// подключаемся к БД
$db = mysqli_connect('localhost', 'root', '', 'GB') or die ("Невозможно подключиться к БД");

$startFrom = $_POST['startFrom'];

$res = mysqli_query($db, "SELECT * FROM product WHERE 1 ORDER BY id LIMIT {$startFrom}, 5");

$products = [];
while ($row = mysqli_fetch_assoc($res)) {
	$products[] = $row;
} 

echo json_encode($products);