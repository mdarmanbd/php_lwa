<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php
$statement = $pdo->prepare("SELECT * FROM products WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$existing_data = $statement->fetch(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if(!$total) {
    header("location: ".ADMIN_URL."product-view.php");
    exit;
}

?>

<?php 

    if(isset($_POST['form1'])){
        try{

            $path = $_FILES['photo']['name'];
            $path_tmp = $_FILES['photo']['tmp_name'];
            if($path == '') {
                throw new Exception('You must have to select a photo');
            }

            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $path_tmp);
            if($mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'image/gif') {
                throw new Exception('Invalid Photo Type');
            }

            $filename = 'product_'.time().".".$extension;
            $destination = '../uploads/' . $filename;

            move_uploaded_file($path_tmp, $destination);


            $statement = $pdo->prepare("INSERT INTO product_photos (product_id, photos) VALUES (?,?)");
            $statement->execute([$_REQUEST['id'], $filename]);

            $_SESSION['success_message'] = 'Photo has been updated successfully';
            header("location: ".ADMIN_URL."product-photo-gallery.php?id=".$_REQUEST['id']);
            exit;


        }catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }


?>

<?php
if(isset($_POST['form2'])) {
    try {

        $path = $_FILES['photo']['name'];
        $path_tmp = $_FILES['photo']['tmp_name'];
        if($path == '') {
            throw new Exception('You must have to select a photo');
        }

        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $path_tmp);
        if($mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'image/gif') {
            throw new Exception('Invalid Photo Type');
        }

        $statement = $pdo->prepare("SELECT * FROM product_photos WHERE id=?");
        $statement->execute([$_POST['product_photo_id']]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        unlink('../uploads/'.$result['photos']);

        $filename = 'product_'.time().".".$extension;
        $destination = '../uploads/'.$filename;
        move_uploaded_file($path_tmp, $destination);

        $statement = $pdo->prepare("UPDATE product_photos SET photos=? WHERE id=?");
        $statement->execute([$filename,$_POST['product_photo_id']]);
        
        $_SESSION['success_message'] = 'Photo has been updated successfully';
        header("location: ".ADMIN_URL."product-photo-gallery.php?id=".$_REQUEST['id']);
        exit;

    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>

<?php
if(isset($_POST['form3'])) {
    try {

        $statement = $pdo->prepare("SELECT * FROM product_photos WHERE id=?");
        $statement->execute([$_POST['product_photo_id']]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        unlink('../uploads/'.$result['photos']);

        $statement = $pdo->prepare("DELETE FROM product_photos WHERE id=?"); 
        $statement->execute([$_POST['product_photo_id']]);
        
        $_SESSION['success_message'] = 'Photo has been delete successfully';
        header("location: ".ADMIN_URL."product-photo-gallery.php?id=".$_REQUEST['id']);
        exit;

    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>


    <div class="right-part container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

                <h1 class="page-heading">
                    Photo Gallery of Product: <?php echo $existing_data['name']; ?>
                    <a href="<?php echo ADMIN_URL;?>product-view.php" class="btn btn-primary btn-sm right"><i class="fas fa-eye"></i> Show All</a>
                </h1>
                
                 <div class="row">
                <div class="col-md-8">
                    <h1 class="page-heading">
                        All Photos
                    </h1>

                    <div class="table-responsive">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 0;
                                    $statement = $pdo->prepare("SELECT * FROM product_photos WHERE product_id=? ORDER BY id ASC");
                                    $statement->execute([$_REQUEST['id']]);
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    $total = $statement->rowCount();
                                    if(!$total){
                                        echo "<tr><td colspan='3' class='text-center text-danger'>No Photo Found</td></tr>";
                                    }
                                    foreach($result as $row){
                                        $i++;
                                        ?>
                                            <tr style="vertical-align: middle;">
                                                <td> <?php echo $i; ?> </td>
                                                <td>
                                                    <img src="<?php echo BASE_URL; ?>uploads/<?php echo $row['photos']; ?>" alt="" style="width:100px; height:auto;">
                                                </td>
                                                <td class="">
                                                    <a href="" class="btn btn-warning btn-sm mr_5" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id']; ?>" style="float:left;">Edit</a>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="product_photo_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm" name="form3" onClick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                             <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Photo</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="product_photo_id" value="<?php echo $row['id']; ?>">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Existing Photo</label>
                                                                    <div>
                                                                        <img src="<?php echo BASE_URL; ?>uploads/<?php echo $row['photos']; ?>" alt="" style="width:100px; height:auto;">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Change Photo</label>
                                                                    <div>
                                                                        <input type="file" name="photo">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <button type="submit" class="btn btn-primary btn-sm" name="form2">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- // Modal -->
                                        <?php
                                    }
                                ?>
                               
                                

                               
                                
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-4">
                    <h1 class="page-heading">
                        Add Photo
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Photo *</label>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-sm" name="form1">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>



            </main>
        </div>
    </div>

    <?php include 'footer.php'; ?>