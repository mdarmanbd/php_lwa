<?php 
    include 'header.php';

    if(isset($_POST['login_form'])){
        try{
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

            if($email == ''){
                throw new Exception ("email field should not be empty");
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Please enter a valid email');
            }

            if($password == ''){
                throw new Exception ("password field should not be empty");
            }

            // $hasPassword = password_hash($password, PASSWORD_DEFAULT);

            $q = $pdo->prepare("SELECT * FROM admins WHERE email=? AND status=?");
            $q->execute([$email,'Active']);
            $total = $q->rowCount();
            
            if(!$total) {
                throw new Exception("Email is not found");
            }

            $result = $q->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                if(!password_verify($password, $row['password'])) {
                    throw new Exception("Password does not match");
                }
            } 
            
            // $result = $q->fetch(PDO::FETCH_ASSOC);
            // if(!password_verify($password, $result['password'])) {
            //         throw new Exception("Password does not match");
            //     }

            $_SESSION['admin'] = $result;
            $_SESSION["success_message"] = "Successfuly Loged in";
            header('location: '.ADMIN_URL);

            exit;


        }catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }


?>

    <div class="container-login">
        <main class="form-signin w-100 m-auto">
            <h1 class="text-center">Admin Login</h1>
            <div>
                <span class="d-block">Email: ar@gmail.com</span>
                <span class="d-block">Password: 12345</span>
            </div>
            <form action=" " method="post">
                <div class="form-floating">
                    <input type="text" name="email" class="form-control" id="" placeholder="name@example.com" autocomplete="off">
                    <label for="">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="" placeholder="Password" autocomplete="off">
                    <label for="">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="login_form">Login</button>
            </form>
            <div class="login-forget-password">
                <a href="<?php echo ADMIN_URL;?>forget-password.php">Forget Password</a>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>


    