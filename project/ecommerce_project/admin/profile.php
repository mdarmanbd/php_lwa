
<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php 
    if(isset($_POST['form1'])){
        echo '<br>';
        print_r($_SESSION['admin']);
        echo '</br>';

        try {
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $confirm_password = strip_tags($_POST['confirm_password']);

            if($name == '') {
                throw new Exception('Please enter your name');
            }
            if($email == '') {
                throw new Exception('Please enter your email');
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Please enter a valid email');
            }
            // If email already exists
            $q = $pdo->prepare("SELECT * FROM admins WHERE email=? AND id!=?");
            $q->execute([$email, $_SESSION['admin'][0]['id']]);
            $total = $q->rowCount();
            if($total) {
                throw new Exception('Email already exists');
            }  
            
            if($password != '' || $confirm_password != '') {
                if($password != $confirm_password) {
                    throw new Exception('Password and Confirm Password do not match');
                }
                $final_password = password_hash($password, PASSWORD_DEFAULT);
                $q = $pdo->prepare("UPDATE admins SET name=?, email=?, password=? WHERE id=?");
                $q->execute([$name, $email, $final_password, $_SESSION['admin'][0]['id']]);
            } else {
                $q = $pdo->prepare("UPDATE admins SET name=?, email=? WHERE id=?");
                $q->execute([$name, $email, $_SESSION['admin'][0]['id']]);
            }

            $_SESSION['admin'][0]['name'] = $name;
            $_SESSION['admin'][0]['email'] = $email;

            $_SESSION['success_message'] = 'Profile updated successfully';
            header("location: ".ADMIN_URL."profile.php");
            exit;
            
        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <div class="right-part container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

                <h1 class="page-heading">Edit Profile</h1>

                <!-- Array ( 
                    [0] => Array ( 
                        [id] => 1 
                        [name] => arman 
                        [email] => ar@gmail.com 
                        [password] => $2y$10$6kkyb49RdnGiDNBlbHqsYONF9CxxUfFoTWhdtfVW2Uf0NNfzYlOha 
                        [token] => b275c2e83417ead4771e1028d844445ca81f4713e922189272df8b4bdde5c3b7 
                        [role] => Super Admin 
                        [status] => Active ) 
                    ) -->


                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                       
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['admin'][0]['name'];?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['admin'][0]['email'];?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="submit" name="form1" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </main>
        </div>
    </div>

    <?php include 'footer.php'; ?>