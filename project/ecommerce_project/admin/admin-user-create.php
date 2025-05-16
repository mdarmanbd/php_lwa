<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

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
            $role = strip_tags($_POST['role']);
            $status = strip_tags($_POST['status']);

            if($name == ''){
                throw new Exception ("email field should not be empty");
            }

            if($email == ''){
                throw new Exception ("email field should not be empty");
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Please enter a valid email');
            }

            if($password == ''){
                throw new Exception ("password field should not be empty");
            }

            $final_password = password_hash($password, PASSWORD_DEFAULT);

            $q = $pdo->prepare("INSERT INTO admins (name,email,password,token,role,status) 
            VALUES (?,?,?,?,?,?)");
            $q->execute([$name,$email,$final_password,'',$role,$status]);
            
            $link = ADMIN_URL;
            $email_message = 'Welcome to our admin panel.Your account has been created successfully';
            $email_message .= '<a href="'.$link.'"';
            $email_message .= $link;
            $email_message .= '</a>';
            $email_message .= 'Email: '.$email.'</br>';
            $email_message .= 'Password: '.$password.'</br>';

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
            $mail->Subject = 'Account Created';
            $mail->Body = $email_message;
            $mail->send();

        
            $_SESSION["success_message"] = "Admin user has been created successfuly";
            header('location: '.ADMIN_URL.'admin-users.php');

            exit;


        }catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }


?>


    <div class="right-part container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

                <h1 class="page-heading">
                    Create Admin User
                    <a href="<?php echo ADMIN_URL;?>admin-users.php" class="btn btn-primary btn-sm right"><i class="fas fa-eye"></i> Show All</a>
                </h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="role" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Moderator">Moderator</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary" name="form1">Submit</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <?php include 'footer.php'; ?>