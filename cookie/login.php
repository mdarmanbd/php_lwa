<?php 
if(isset($_POST['form1'])){
    try{
        if($_POST['username'] !== 'admin' && $_POST['password'] !== 1234){
            throw new Exception("user namde should be 'admin' & password 1234");
        }

        setcookie('username', $_REQUEST['username'], time()+(86400));
        setcookie('password', $_REQUEST['password'], time()+(86400));
        header('location: welcome.php');
    }
    catch(Exception $e){
        $error_message = $e->getMessage();
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 320px;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
    }

    td {
      padding: 8px 0;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      width: 100%;
      margin-left: 15px;
      padding: 10px;
      background-color: #3498db;
      border: none;
      color: white;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h2>Login</h2>
  <form action="login.php" method="POST">
    <table>
        <tr>
            <td>
                <?php 
                    if(isset($error_message)){
                        ?>
                            <div >
                              <P style="color: red";><?php echo $error_message; ?></P>  
                            </div>
                        <?php
                    }
                ?>
            </td>
        </tr>
      <tr>
        
        <td>Username:</td>
        <td><input type="text" name="username" ></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><input type="password" name="password" ></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="form1" value="Login">
        </td>
      </tr>
    </table>
  </form>
</div>

</body>
</html>
