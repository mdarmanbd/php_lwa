<?php include 'header.php'; ?>

<?php 
    if(isset($_GET['email']) && isset($_GET['token'])) {

        $email = strip_tags($_GET['email']);
        $token = strip_tags($_GET['token']);

        $q = $pdo->prepare("SELECT * FROM admins WHERE email=? AND token=?");
        $q->execute([$email,$token]);
        $total = $q->rowCount();
        if(!$token){
            header('location:'.ADMIN_URL.'login.php');
            exit;
        }

    }else{
        header('location:'.ADMIN_URL.'login.php');
    }

?>

<?php
    if(isset($_POST['form1'])) {
        try {
            if($_POST['password'] == '' || $_POST['confirm_password'] == '') {
                throw new Exception("Password can not be empty");
            }

            if($_POST['password'] != $_POST['confirm_password']) {
                throw new Exception("Passwords must match");
            }
            
            $final_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $statement = $pdo->prepare("UPDATE admins SET token=?, password=? WHERE email=? AND token=?");
            $statement->execute(['',$final_password,$_REQUEST['email'],$_REQUEST['token']]);

            $_SESSION['success_message'] = 'Reset password set successfuly';

            header('location: '.ADMIN_URL.'login.php');

            exit;

        } catch(Exception $e) {
            $error_message = $e->getMessage();
        }
    }
?>

    <div class="container-login">
        <main class="form-signin w-100 m-auto">
            <form action="" method="post">
                <h1 class="text-center">Reset Password</h1>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off">
                    <label for="floatingPassword">New Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="confirm_password" class="form-control" id="floatingPassword" placeholder="Confirm Password" autocomplete="off">
                    <label for="floatingPassword">Confarm Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="form1">Submit</button>
            </form>
        </main>
    </div>

    <?php include 'footer.php'; ?>