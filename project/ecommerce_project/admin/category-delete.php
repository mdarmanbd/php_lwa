<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php
$statement = $pdo->prepare("SELECT * FROM categories WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$existing_data = $statement->fetch(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if(!$total) {
    header("location: ".ADMIN_URL."category-view.php");
    exit;
}



?>

<?php 

$q = $pdo->prepare("DELETE FROM categories WHERE id=?");
$q->execute([$_REQUEST['id']]);
header("location: ".ADMIN_URL."category-view.php");
$_SESSION['success_message'] = 'Category has been deleted successfully';
exit;


?>