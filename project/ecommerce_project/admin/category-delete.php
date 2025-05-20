<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php

if($_SESSION['admin'][0]['role'] == 'Moderator'){
    header('location:'.ADMIN_URL.'index.php');
}

?>

<?php
$statement = $pdo->prepare("SELECT * FROM categories WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$existing_data = $statement->fetch(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if(!$total) {
    header("location: ".ADMIN_URL."category-view.php");
    exit;
}

$statement = $pdo->prepare("SELECT * FROM products WHERE category_id=?");
$statement->execute([$_REQUEST['id']]);
$total = $statement->rowCount();
if($total){
   $_SESSION['error_message'] = 'Category cannot be deleted as it is associated with products';
    header("location: ".ADMIN_URL."category-view.php");
    exit;
}

?>

<?php 

unlink('../uploads/'.$existing_data['photo']);

$q = $pdo->prepare("DELETE FROM categories WHERE id=?");
$q->execute([$_REQUEST['id']]);
header("location: ".ADMIN_URL."category-view.php");
$_SESSION['success_message'] = 'Category has been deleted successfully';
exit;

?>