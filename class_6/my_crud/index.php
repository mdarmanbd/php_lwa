<?php
include 'config.php';

if(isset($_POST['creat'])){
    
    try{

        if($_POST['name'] == ''){
            throw new Exception("Name can not be empty");
        }
        if($_POST['email'] == ''){
            throw new Exception("Email can not be empty");
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is not valid");
        }

        $stmt = $pdo->prepare("SELECT * FROM customers WHERE email=?");
        $stmt->execute([$_POST['email']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if($result) {
            throw new Exception("Email already exists , enter a new email");
        }

        $statement = $pdo->prepare("INSERT INTO customers (name,email) VALUES (?,?)");
        $statement->execute([$_POST['name'],$_POST['email']]);

        $success_message = "Student has been added successfully";

    } catch(Exception $e) {
        $error_message = $e->getMessage();
     }
}


if(isset($_GET['edit'])){
   
    try{

        if($_POST['name'] == ''){
            throw new Exception("Name can not be empty");
        }
    
        if($_POST['email'] == ''){
            throw new Exception("Email can not be empty");
        }
    
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is not valid");
        }

        $stmt = $pdo->prepare("SELECT * FROM customers WHERE email=? AND id!=?");
        $stmt->execute([$_POST['email'],$_REQUEST['id']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result) {
            throw new Exception("Email already exists");
        }

        $statement = $pdo->prepare("UPDATE customers SET name=?,email=? WHERE id=?");
        $statement->execute([$_POST['name'],$_POST['email'],$_REQUEST['id']]);

        $edite_success_message = "Student has been updated successfully";

    }catch(Exception $e) {
        $edite_error_message = $e->getMessage();
     }

   $edit_statement = $pdo->prepare("SELECT * FROM customers WHERE id=?");
   $edit_statement->execute([$_REQUEST['id']]);
   $edit_result = $edit_statement->fetch(PDO::FETCH_ASSOC);

//    echo "<pre>";
//    print_r($edit_result);
//    echo "</pre>";

}

if(isset($_GET['delete'])){
    $statement = $pdo->prepare("DELETE FROM customers WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    header("location: index.php");
    exit();
    
}


$stmt = $pdo->prepare("SELECT * FROM customers");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>MY CRUD</title>
</head>
<body>
    <h2>MY CRUD Application</h2>

    <div style="display:flex; gap:100px">
    
    <form action=" " method="post" style="width:50%" border="0" cellpadding="1" cellspacing="1">

        <h3>Create customer</h3>

        <?php 
        if(isset($error_message)){
        ?>
            <div style="color:red">
                <?php echo $error_message; ?>
            </div>
        <?php
        }
        ?>

        <?php 
        if(isset($success_message)){
        ?>
            <div style="color:green">
                <?php echo $success_message ; ?>
            </div>
        <?php
        }
        ?>

        <table>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name="email">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="creat">Creat</button>
                </td>
            </tr>
            
        </table>
    </form>


    <!-- edite form start -->
    
    <form action=" " method="post" style="width:50%" border="0" cellpadding="1" cellspacing="1">

        <h3>Edite form</h3>

        <?php 
        if(isset($edite_error_message)){
        ?>
            <div style="color:red">
                <?php echo $edite_error_message; ?>
            </div>
        <?php
        }
        ?>

        <?php 
        if(isset($edite_success_message)){
        ?>
            <div style="color:green">
                <?php echo $edite_success_message ?>
            </div>
        <?php
        }
        ?>

        <table>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name" value="<?php if(isset($_GET['edit'])) {echo $edit_result['name'];} ?>">
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name="email" value="<?php if(isset($_GET['edit'])) {echo $edit_result['email'];} ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="form1">Submit</button>
                </td>
            </tr>
        </table>
    </form>

    </div>

    <table style="width:100%; margin-top:30px;"  border="1" cellpadding="10" cellspacing="3">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
        <tr>
            <?php foreach($result as $row){
            ?> 
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="index.php?edit=1&id=<?php echo $row['id']; ?>"> edit</a>
                        <a href="index.php?delete=1&id=<?php echo $row['id']; ?>"> delete</a>
                       
                    </td>
                </tr>

            <?php
            }  
            ?>
        </tr>
    </table>

</body>
</html>