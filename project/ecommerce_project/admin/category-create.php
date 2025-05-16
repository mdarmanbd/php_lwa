<?php include 'header.php'; ?>
<?php include 'top.php'; ?>

<?php 

    if(isset($_POST['form1'])){
        try{
            $name = strip_tags($_POST['name']);
            $item_order = (int)($_POST['item_order']);
            
            if($name == ''){
                throw new Exception ("email field should not be empty");
            }

            if($item_order == ''){
                throw new Exception ("email field should not be empty");
            }

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

          //  $filename = 'category_'.time().".".$extension;
           // $destination = '../uploads'.$filename;
            // image_resize($path_tmp,$destination,400,500);

            $filename = 'category_'.time().".".$extension;
$destination = '../uploads/' . $filename;

move_uploaded_file($path_tmp, $destination);


            $statement = $pdo->prepare("INSERT INTO categories (name,photo,item_order) VALUES (?,?,?)");
            $statement->execute([$name,$filename,$item_order]);

            $_SESSION['success_message'] = 'Category has been created successfully';
            header("location: ".ADMIN_URL."category-view.php");
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
                    Create Categorey
                    <a href="<?php echo ADMIN_URL;?>category-view.php" class="btn btn-primary btn-sm right"><i class="fas fa-eye"></i> Show All</a>
                </h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3">

                            <label for="" class="form-label">Photo *</label>

                            <div>
                                 <input type="file" class="form-control" name="photo">
                            </div>
                           
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Name *</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                       <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Order *</label>
                            <input type="text" class="form-control" name="item_order">
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