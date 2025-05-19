<?php include "header.php"; ?>
<?php include "top.php"; ?>

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
    if(isset($_POST['form1'])) {
        try {
            $name = strip_tags($_POST['name']);
            $slug = strip_tags($_POST['slug']);
            $category_id = $_POST['category_id'];
            $quantity = $_POST['quantity'];
            $regular_price = $_POST['regular_price'];
            $sale_price = $_POST['sale_price'];
            $short_description = strip_tags($_POST['short_description']);
            $description = $_POST['description'];
            $sku = strip_tags($_POST['sku']);
            $size = strip_tags($_POST['size']);
            $color = strip_tags($_POST['color']);
            $capacity = strip_tags($_POST['capacity']);
            $weight = strip_tags($_POST['weight']);
            $pocket = strip_tags($_POST['pocket']);
            $water_resistant = strip_tags($_POST['water_resistant']);
            $warranty = strip_tags($_POST['warranty']);

            if($name == '') {
                throw new Exception('Please enter your name');
            }
            if($slug == '') {
                throw new Exception('Please enter slug');
            }
            // Slug Validation using regex
            if(!preg_match('/^[a-zA-Z0-9-]+$/', $slug)) {
                throw new Exception('Slug can only contain letters, numbers, and hyphens');
            }
            if($category_id == '') {
                throw new Exception('Please select a category');
            }
            if($quantity == '') {
                throw new Exception('Please enter quantity');
            }
            if(!is_numeric($quantity)) {
                throw new Exception('Quantity must be a number');
            }
            if($regular_price == '') {
                throw new Exception('Please enter regular price');
            }
            if(!is_numeric($regular_price)) {
                throw new Exception('Regular price must be a number');
            }
            if($sale_price == '') {
                throw new Exception('Please enter sale price');
            }
            if(!is_numeric($sale_price)) {
                throw new Exception('Sale price must be a number');
            }
            if($sale_price > $regular_price) {
                throw new Exception('Sale price must be less than or equal to regular price');
            }
            if($short_description == '') {
                throw new Exception('Please enter short description');
            }
            if($description == '') {
                throw new Exception('Please enter description');
            }

            $path = $_FILES['featured_photo']['name'];
            $path_tmp = $_FILES['featured_photo']['tmp_name'];
            if($path == '') {
                $filename = $existing_data['featured_photo'];
            } else {
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $path_tmp);
                if($mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'image/gif') {
                    throw new Exception('Invalid Photo Type');
                }

                $filename = 'product_f_'.time().".".$extension;
            }

            $destination = '../uploads/' . $filename;
            move_uploaded_file($path_tmp, $destination);

            $statement = $pdo->prepare("UPDATE products SET name=?,slug=?,category_id=?,quantity=?,regular_price=?,sale_price=?,short_description=?,description=?,sku=?,size=?,color=?,capacity=?,weight=?,pocket=?,water_resistant=?,warranty=?,featured_photo=? WHERE id=?");
            $statement->execute([$name,$slug,$category_id,$quantity,$regular_price,$sale_price,$short_description,$description,$sku,$size,$color,$capacity,$weight,$pocket,$water_resistant,$warranty,$filename,$_REQUEST['id']]);

            $_SESSION['success_message'] = 'Product has been updated successfully';
            header("location: ".ADMIN_URL."product-view.php");
            exit;

        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
?>

<?php
$statement = $pdo->prepare("SELECT * FROM products WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div class="right-part container-fluid">
    <div class="row">
        
        <?php include "sidebar.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

            <h1 class="page-heading">
                Edit Product
                <a href="<?php echo ADMIN_URL ?>product-view.php" class="btn btn-primary btn-sm right"><i class="fas fa-eye"></i> Show All</a>
            </h1>

            <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">Existing Featued Photo</label>
                    <div>
                        <img src="<?php echo BASE_URL; ?>uploads/<?php echo $result['featured_photo']; ?>" alt="" style="width:100px; height:auto;">
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">Change Featued Photo</label>
                    <div>
                        <input type="file" name="featured_photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Name *</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Slug *</label>
                        <input type="text" class="form-control" name="slug" value="<?php echo $result['slug']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Category *</label>
                        <select name="category_id" class="form-select">
                            <?php 
                            $statement = $pdo->prepare("SELECT * FROM categories ORDER BY item_order ASC");
                            $statement->execute();
                            $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($categories as $row) {
                                ?>
                                    <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $result['category_id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Quantity *</label>
                        <input type="text" class="form-control" name="quantity" value="<?php echo $result['quantity']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Regular Price *</label>
                        <input type="text" class="form-control" name="regular_price" value="<?php echo $result['regular_price']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Sale Price *</label>
                        <input type="text" class="form-control" name="sale_price" value="<?php echo $result['sale_price']; ?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Short Description *</label>
                        <textarea name="short_description" class="form-control"><?php echo $result['short_description']; ?></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Description *</label>
                        <textarea name="description" class="form-control editor"><?php echo $result['description']; ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">SKU</label>
                        <input type="text" class="form-control" name="sku" value="<?php echo $result['sku']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Size</label>
                        <input type="text" class="form-control" name="size" value="<?php echo $result['size']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Color</label>
                        <input type="text" class="form-control" name="color" value="<?php echo $result['color']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Capacity</label>
                        <input type="text" class="form-control" name="capacity" value="<?php echo $result['capacity']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Weight</label>
                        <input type="text" class="form-control" name="weight" value="<?php echo $result['weight']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Pocket</label>
                        <input type="text" class="form-control" name="pocket" value="<?php echo $result['pocket']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Water Resistant</label>
                        <select name="water_resistant" class="form-select">
                            <option value="Yes" <?php if($result['water_resistant'] == 'Yes') echo 'selected'; ?>>Yes</option>
                            <option value="No" <?php if($result['water_resistant'] == 'No') echo 'selected'; ?>>No</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Warranty</label>
                        <input type="text" class="form-control" name="warranty" value="<?php echo $result['warranty']; ?>">
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary" name="form1">Update</button>
                </div>
            </div>
            </form>
        </main>
    </div>
</div>

<?php include "footer.php"; ?>