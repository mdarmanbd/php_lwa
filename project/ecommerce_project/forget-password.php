<?php include 'header.php'; ?>

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

            $q = $pdo->prepare("SELECT * FROM users WHERE email=? AND status=?");
            $q->execute([$email,'Active']);
            $total = $q->rowCount();

            if(!$total) {
                throw new Exception("Email is not found");
            }
            

            $token = bin2hex(random_bytes(32)); 
            $statement = $pdo->prepare("UPDATE users SET token=? WHERE email=?");
            $statement->execute([$token,$email]);
            
    
            $link = BASE_URL.'reset-password.php?email='.$email.'&token='.$token;
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
            header('location:'.BASE_URL.'reset-password.php');

            exit;


        }catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }

?>

<!-- breadcrumb start -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="<?php echo BASE_URL;?>">Home</a></li>
            <li class="ml_10 mr_10">
                <i class="fas fa-chevron-right"></i>
            </li>
            <li>Forget Password</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<main id="MainContent" class="content-for-layout">
    <div class="login-page mt-100">
        <div class="container">
            <form action="" class="login-form common-form mx-auto" method="post">
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center">Forget Password</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email address</label>
                            <input type="text" name="email">
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" name="form1" class="btn-primary d-block btn-signin">SUBMIT</button>
                        <a href="<?php echo BASE_URL;?>login.php" class="text_14 d-block mt-4">Back to Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>            
</main>

<?php include 'footer.php'; ?>