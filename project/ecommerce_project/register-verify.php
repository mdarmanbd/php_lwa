<?php include 'header.php'; ?>

<?php 

   if(!isset($_REQUEST['email']) || !isset($_REQUEST['token'])) {
        header("location: ".BASE_URL);
        exit;
    }

    $email = strip_tags($_REQUEST['email']);
    $token = strip_tags($_REQUEST['token']);

    $statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND token=?");
    $statement->execute([$email,$token]);
    $total = $statement->rowCount();
    if(!$total) {
        header("location: ".BASE_URL);
        exit;
    }

    $statement = $pdo->prepare("UPDATE users SET token=?,status=? WHERE email=? AND token=?");
    $statement->execute(['','Active',$email,$token]);

    $_SESSION['success_message'] = 'Your email has been verified successfully. You can now login to your account.';
    header("location: ".BASE_URL."login.php");
    exit;
?>