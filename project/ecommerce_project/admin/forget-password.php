<?php 
    include 'header.php';
?>

<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>
<?php 
    if(isset($_POST['form1'])){
        try{
            
            $email = strip_tags($_POST['email']);

            if($email == ''){
                throw new Exception ("email field should not be empty");
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Please enter a valid email');
            }

            $q = $pdo->prepare("SELECT * FROM admins WHERE email=? AND status=?");
            $q->execute([$email,'Active']);
            $total = $q->rowCount();

            if(!$total) {
                throw new Exception("Email is not found");
            }
            

            $token = bin2hex(random_bytes(32)); 
            $statement = $pdo->prepare("UPDATE admins SET token=? WHERE email=?");
            $statement->execute([$token,$email]);
            
    
            $link = ADMIN_URL.'reset-password.php?email='.$email.'&token='.$token;
            $email_message = 'Please click on this link to reset your password: <br>';
            $email_message .= '<a href="'.$link.'">';
            $email_message .= $link;
            $email_message .= '</a>';
    
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USERNAME;
            $mail->Password = SMTP_PASSWORD;
            $mail->SMTPSecure = SMTP_ENCRYPTION;
            $mail->Port = SMTP_PORT;
        
            $mail->setFrom(SMTP_FROM);
            $mail->addAddress($email);
            $mail->addReplyTo(SMTP_FROM);
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = $email_message;
            $mail->send();
            
            $_SESSION['success_message'] = 'An email has been sent to your email address.please check your 
            inbox';

          //  header('location:'. ADMIN_URL.'forget-password.php');
            header('location:'.ADMIN_URL.'reset-password.php');

            exit;


        }catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }

?>


    <div class="container-login">
        <main class="form-signin w-100 m-auto">
            <form action="" method="post">
                <h1 class="text-center">Forget Password</h1>
            
                <div class="form-floating">
                    <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" autocomplete="off">
                    <label for="floatingInput">Email address</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="form1">Submit</button>
            </form>
            <div class="login-forget-password">
                <a href="<?php echo ADMIN_URL;?>login.php">Back to Login Page</a>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>