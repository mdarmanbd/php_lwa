<?php
include 'config.php';


if(isset($_POST['form1'])){
   // echo $_REQUEST['id'];

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

    $stmt = $pdo->prepare("SELECT * FROM students WHERE email=? AND id!=?");
    $stmt->execute([$_POST['email'],$_REQUEST['id']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result) {
        throw new Exception("Email already exists");
    }
  
    $statement = $pdo->prepare("UPDATE students SET name=?,email=? WHERE id=?");
    $statement->execute([$_POST['name'],$_POST['email'],$_REQUEST['id']]);

    $success_message = "Student has been updated successfully";


}catch(Exception $e) {
     $error_message = $e->getMessage();
  }


   
}
   $statement = $pdo->prepare("SELECT * FROM students WHERE id=?");
   $statement->execute([$_REQUEST['id']]);
   $result = $statement->fetch(PDO::FETCH_ASSOC);

//    echo "<pre>";
//    print_r($result);
//    echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY CRUD</title>
</head>
<body>
    <h2>CRUD Application</h2>

    <div>
        <a href="create.php">Create Student</a> | <a href="index.php">All Student</a>
    </div>

    <h3>Edit Student</h3>
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
            <?php echo $success_message ?>
        </div>
    <?php
    }
    ?>
    

    <form action=" " method="post" style="width:50%" border="0" cellpadding="1" cellspacing="1">
        <table>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name" value="<?php echo $result['name']; ?>">
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name="email" value="<?php echo $result['email']; ?>">
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
</body>
</html>