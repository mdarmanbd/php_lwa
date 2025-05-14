<?php include "header.php"; ?>
<?php
if(!isset($_SESSION['user'])) {
    header("location: ".BASE_URL."login.php");
    exit;
}
?>

<?php 
    if(isset($_POST['form1'])){
    
        try {
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $mobile = strip_tags($_POST['mobile']);
            $address = strip_tags($_POST['address']);
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
            $q = $pdo->prepare("SELECT * FROM users WHERE email=? AND id!=?");
            $q->execute([$email, $_SESSION['user']['id']]);
            $total = $q->rowCount();
            if($total) {
                throw new Exception('Email already exists');
            }  
            if($mobile == '') {
                throw new Exception('Please enter your mobile number');
            }
            if($address == '') {
                throw new Exception('Please enter your address');
            }
            
            if($password != '' || $confirm_password != '') {
                if($password != $confirm_password) {
                    throw new Exception('Password and Confirm Password do not match');
                }
                $final_password = password_hash($password, PASSWORD_DEFAULT);
                $q = $pdo->prepare("UPDATE users SET name=?, email=?, mobile=?, address=?, password=? WHERE id=?");
                $q->execute([$name, $email, $mobile, $address, $final_password, $_SESSION['user']['id']]);
            } else {
                $q = $pdo->prepare("UPDATE users SET name=?, email=?, mobile=?, address=? WHERE id=?");
                $q->execute([$name, $email, $mobile, $address, $_SESSION['user']['id']]);
            }

            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['mobile'] = $mobile;
            $_SESSION['user']['address'] = $address;

            $_SESSION['success_message'] = 'Profile updated successfully';
            header("location: ".BASE_URL."user-profile.php");
            exit;
            
        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
?>


<!-- breadcrumb start -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
            <li class="ml_10 mr_10">
                <i class="fas fa-chevron-right"></i>
            </li>
            <li>User Profile</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<main id="MainContent" class="content-for-layout">
    <div class="article-page mt_40">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-12 col-12">
                    <div class="user-menu">
                        <?php include "user-sidebar.php"; ?>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 col-12 user-content">
                    <h2 class="mb_30">Update Profile Information</h2>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label" style="font-size:18px">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['user']['name'];?>" style="font-size:18px">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"style="font-size:18px">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['user']['email'];?>" style="font-size:18px">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label"style="font-size:18px">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="<?php echo $_SESSION['user']['mobile'];?>" style="font-size:18px">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label"style="font-size:18px">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $_SESSION['user']['address'];?>"style="font-size:18px">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label"style="font-size:18px">Password</label>
                            <input type="password" class="form-control" name="password" value="" style="font-size:18px">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label"style="font-size:18px">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" value="" style="font-size:18px">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="form1">Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>            
</main>


<?php include "footer.php"; ?>