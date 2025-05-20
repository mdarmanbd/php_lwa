<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php

if($_SESSION['admin'][0]['role'] == 'Moderator'){
    header('location:'.ADMIN_URL.'index.php');
}

?>

<?php
$statement = $pdo->prepare("SELECT * FROM categories WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$existing_data = $statement->fetch(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if(!$total) {
    header("location: ".ADMIN_URL."category-view.php");
    exit;
}
?>


<?php
if(isset($_POST['form1'])) {
    try {
        $name = strip_tags($_POST['name']);
        $item_order = (int)($_POST['item_order']);

        if($name == '') {
            throw new Exception('Please enter your name');
        }
        if($item_order == '') {
            throw new Exception('Please enter item order');
        }

        $path = $_FILES['photo']['name'];
        $path_tmp = $_FILES['photo']['tmp_name'];

        if($path == '') {
            $filename = $existing_data['photo'];
        } else {
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $path_tmp);
            if($mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'image/gif') {
                throw new Exception('Invalid Photo Type');
            }

            $filename = 'category_'.time().".".$extension;
           
        }

        // $filename = 'category_'.time().".".$extension;
        $destination = '../uploads/' . $filename;
        move_uploaded_file($path_tmp, $destination);

        $statement = $pdo->prepare("UPDATE categories SET name=?,photo=?,item_order=? WHERE id=?");
        $statement->execute([$name,$filename,$item_order,$_REQUEST['id']]);
        
        $_SESSION['success_message'] = 'Category has been updated successfully';
        header("location: ".ADMIN_URL."category-view.php");
        exit;
        
        

    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>

<?php 

    $statement = $pdo->prepare("SELECT * FROM categories WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
?>
   


    <div class="right-part container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>
            
            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

                <h1 class="page-heading">
                    Edit Category
                    <a href="<?php echo ADMIN_URL;?>category-view.php" class="btn btn-primary btn-sm right"><i class="fas fa-eye"></i> Show All</a>
                </h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Existing Photo</label>
                            <div>
                                <img  src="<?php echo BASE_URL; ?>uploads/<?php echo $result['photo']; ?>" style="width:140px; height:auto;" alt="img">
                            </div>
                           
                        </div>
                        <div class="col-md-12 mb-3">
                             <label for="" class="form-label">Change Photo</label>
                            <div>
                               <input type="file" name="photo">
                            </div>
                        </div>

                         <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Name *</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Order *</label>
                            <input type="text" class="form-control" name="item_order" value="<?php echo $result['item_order']; ?>">
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