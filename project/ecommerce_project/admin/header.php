<?php 
    ob_start();
    session_start();
    include "../config/config.php";

    $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
?>

<?php 
    if($cur_page != 'login.php' && $cur_page !='forget-password.php' && $cur_page !='reset-password.php'){
        if(!isset($_SESSION['admin'])){
            header('location:'.ADMIN_URL.'login.php');
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="icon" type="image/png" href="<?php echo BASE_URL;?>uploads/favicon.png">

    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/spacing.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/custom.css">

    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">

</head>
<body class="<?php echo ($cur_page == 'login.php' || $cur_page == 'forget-password.php' || $cur_page == 'reset-password.php' ? 'body-login' : '') ?>">

