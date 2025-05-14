<?php include 'header.php'; ?>

<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
?>

<?php 
    if(isset($_POST['form1'])){
        try{
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $confirm_password = strip_tags($_POST['confirm_password']);

            if($name == ''){
                throw new Exception ("name field should not be empty");
            }

            if($email == ''){
                throw new Exception ("email field should not be empty");
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Please enter a valid email');
            }

            $statement = $pdo->prepare("SELECT * FROM users WHERE email=?");
            $statement->execute([$email]);
            $total = $statement->rowCount();
            if($total){
                throw new Exception ("email has been exists");
            }

            if($password == ''){
                 throw new Exception ("password field should not be empty");
            }

            if($confirm_password == ''){
                 throw new Exception ("confirm password field should not be empty");
            }

            if($password != $confirm_password){
                 throw new Exception ("password & confirm password should be same");
            }

            $final_password = password_hash($password,PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(32)); 

            $statement = $pdo->prepare("INSERT INTO users (name,email,password,token,status) VALUES (?,?,?,?,?)");
            $statement->execute([$name,$email,$final_password,$token,'Inactive']);

           
            $link =BASE_URL.'register-verify.php?email='.$email.'&token='.$token;
            $email_message = 'please click on the link below to verify your email address: <br>';
            $email_message .='<a href="'.$link.'">Verify Email</a>';
            
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
            $mail->Subject = 'Email Verification';
            $mail->Body = $email_message;
            $mail->send();
           
            
             $_SESSION["success_message"] = "Message sent successfuly";
            
            header('location:'.BASE_URL.'login.php');
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
            <li>Register</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<main id="MainContent" class="content-for-layout">
    <div class="login-page mt-100">
        <div class="container">
            <form action="" class="login-form common-form mx-auto" method="post">
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center">Register</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Name</label>
                            <input type="text" name="name">
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email address</label>
                            <input type="email" name="email">
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Password</label>
                            <input type="password" name="password">
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Confirm Password</label>
                            <input type="password" name="confirm_password">
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" name="form1" class="btn-primary d-block mt-3 btn-signin">CREATE ACCOUNT</button>
                        <a href="<?php echo BASE_URL;?>login.php" class="btn-secondary mt-2 btn-signin">GO TO LOGIN PAGE</a>
                    </div>
                </div>
            </form>
        </div>
    </div>            
</main>

<?php include 'footer.php'; ?>