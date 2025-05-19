<?php include 'header.php';?>
<?php include 'top.php'; ?>




    <div class="right-part container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

                <h1 class="page-heading">
                    All product
                    <a href="<?php echo ADMIN_URL;?>product-create.php" class="btn btn-primary btn-sm right"><i class="fas fa-plus"></i> Add New</a>
                </h1>

                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Sale Price</th>
                                <th scope="col">Regular Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Category</th>
                                <th scope="col">Photos</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $i = 0;
                                $q = $pdo->prepare("
                                        SELECT 
                                            p.*,
                                            c.name AS category_name 
                                        FROM 
                                            products p
                                        JOIN 
                                            categories c
                                        ON
                                            p.category_id = c.id
                                        ORDER BY 
                                            p.id DESC
                                    ");
                                $q->execute();
                                $result = $q->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row){
                                     $i++;
                                    ?>
                                        <tr style="vertical-align: middle;">
                                            <td><?php echo $i;?></td>
                                            
                                            <td>
                                                <img src="<?= BASE_URL . 'uploads/' . $row['featured_photo']; ?>" style="width:80px;height:auto;" alt="img">
                                               
                                            </td>

                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['slug']; ?></td>
                                            <td><?php echo $row['sale_price']; ?></td>
                                            <td><?php echo $row['regular_price']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>

                                            <td>
                                                <?php echo $row['category_name']; ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo ADMIN_URL; ?>product-photo-gallery.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Photo Gallery</a>
                                            </td>
                                            
                                            <td>
                                                <a href="<?php echo ADMIN_URL; ?>product-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?php echo ADMIN_URL; ?>product-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>

    <?php include 'footer.php'; ?>