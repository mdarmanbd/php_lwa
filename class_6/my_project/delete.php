<?php 
include 'config.php';

$statement = $pdo->prepare("DELETE FROM students WHERE id=?");
$statement->execute([$_REQUEST['id']]);
header("location: index.php");
exit();


?>