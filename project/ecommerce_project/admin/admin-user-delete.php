<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php 

    $q = $pdo->prepare("SELECT * FROM admins WHERE id=?");
    $q->execute([$_REQUEST['id']]);
    $total = $q->rowCount();
    if(!$total){
        header('location:'.ADMIN_URL.'admin-users.php');
        exit;
    }

    $q = $pdo->prepare("DELETE FROM admins WHERE id=?");
    $q->execute([$_REQUEST['id']]);

    $_SESSION['success_message'] = 'Admin user has been deleted successfuly';
    header('location:'.ADMIN_URL.'admin-users.php');

    // super admin can see all datas
    $r = $q->fetch(PDO::FETCH_ASSOC);
    if($r['role'] == 'Super Admin'){
        header('location:'.ADMIN_URL.'admin-users.php');
        exit;
    }

    // admin can not edit any admin data here.
     if($_SESSION['admin'][0]['role'] == 'Admin'){
        if($r['role'] == 'Admin') {
            header('location:'.ADMIN_URL.'admin-users.php');
            exit;
        }
     }

    // // moderator can not edit any admin or moderator data here.
    if($_SESSION['admin'][0]['role'] == 'Moderator'){
        header('location:'.ADMIN_URL.'admin-users.php');
        exit;
    }

?>