<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php 

    $q = $pdo->prepare("SELECT * FROM admins WHERE id=?");
    $q->execute([$_REQUEST['id']]);
    $total = $q->rowCount();
    if(!$total){
        header('location:'.ADMIN_URL.'admin-users.php');
        exit;
    }

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

            $q = $pdo->prepare("SELECT * FROM admins WHERE id=?");
            $q->execute([$_REQUEST['id']]);
            $existing_data = $q->fetch(PDO::FETCH_ASSOC);

            if($password == $existing_data['password']){
                $final_password = $existing_data['password'];
            }else{
                $final_password = password_hash($password, PASSWORD_DEFAULT);
            }            

            $q = $pdo->prepare("UPDATE admins SET name=?,email=?,password=?,role=?,status=? WHERE id=?");
            $q->execute([$name,$email,$final_password,$role,$status,$_REQUEST['id']]);
            
        
            $_SESSION["success_message"] = "Admin edit has been updated successfuly";
            header('location: '.ADMIN_URL.'admin-users.php');

            exit;


        }catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }

?>

<?php 

    $statement = $pdo->prepare("SELECT * FROM admins WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);


?>


    <div class="right-part container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

                <h1 class="page-heading">
                    Edit Admin User
                    <a href="<?php echo ADMIN_URL;?>admin-users-php" class="btn btn-primary btn-sm right"><i class="fas fa-eye"></i> Show All</a>
                </h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $result['name'];?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $result['email'];?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="role" class="form-control">
                                <option value="Admin" <?php echo($result['role']) == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                                <option value="Moderator" <?php echo($result['role']) == 'Moderator' ? 'selected' : ''; ?>>Moderator</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="Active" <?php echo($result['status']) == 'Active' ? 'selected' : ''; ?>>Active</option>
                                <option value="Inactive" <?php echo($result['status']) == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary" name="form1">Updated</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <?php include 'footer.php'; ?>