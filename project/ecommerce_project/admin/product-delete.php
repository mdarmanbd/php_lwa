<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php
$statement = $pdo->prepare("SELECT * FROM products WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$existing_data = $statement->fetch(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if(!$total) {
    header("location: ".ADMIN_URL."product-view.php");
    exit;
}

?>

<?php 

unlink('../uploads/'.$existing_data['featured_photo']);

$q = $pdo->prepare("DELETE FROM products WHERE id=?");
$q->execute([$_REQUEST['id']]);
header("location: ".ADMIN_URL."product-view.php");
$_SESSION['success_message'] = 'Product has been deleted successfully';
exit;

?>