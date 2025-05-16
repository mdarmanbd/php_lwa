<?php include 'header.php';?>
<?php include 'top.php'; ?>

<?php

// print_r($_SESSION['admin'][0]);
if($_SESSION['admin'][0]['role'] == 'Moderator'){
    header('location:'.ADMIN_URL.'index.php');
}
?>


    <div class="right-part container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

                <h1 class="page-heading">
                    All categories
                    <a href="<?php echo ADMIN_URL;?>category-create.php" class="btn btn-primary btn-sm right"><i class="fas fa-plus"></i> Add New</a>
                </h1>

                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                 <th scope="col">SL</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Order</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $i = 0;
                                $q = $pdo->prepare("SELECT * FROM categories ORDER BY item_order ASC");
                                $q->execute();
                                $result = $q->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row){
                                     $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            
                                            <td>
                                                <img src="<?= BASE_URL . 'uploads/' . $row['photo']; ?>" style="width:80px;height:auto;" alt="img">
                                               
                                            </td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['item_order'];?></td>
                                            
                                            <td>
                                                <a href="<?php echo ADMIN_URL;?>category-edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?php echo ADMIN_URL;?>category-delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                               
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