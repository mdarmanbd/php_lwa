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
                    Admins users
                    <a href="<?php echo ADMIN_URL;?>admin-user-create.php" class="btn btn-primary btn-sm right"><i class="fas fa-plus"></i> Add New</a>
                </h1>

                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $i = 0;
                                $q = $pdo->prepare("SELECT * FROM admins ORDER BY id ASC");
                                $q->execute();
                                $result = $q->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row){
                                    

                                    if($row['role'] == 'Super Admin' || $row['role'] == 'Admin'){
                                        continue;
                                    }
                                    $i++;

                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td>

                                                <?php if($row['role'] == 'Super Admin'):?>
                                                <span class="badge bg-primary">Super Admin</span>
                                                <?php elseif($row['role'] == 'Admin'): ?>
                                                <span class="badge bg-success">Admin</span>
                                                <?php elseif($row['role'] == 'Moderator'): ?>
                                                <span class="badge bg-warning">Moderator</span>
                                                <?php endif; ?>

                                            </td>
                                            <td>
                                                
                                                <?php if($row['status'] == 'Active'):?>
                                                <span class="badge bg-warning">Active</span>
                                                <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                                <?php endif; ?>

                                            </td>
                                            <td>

                                                <?php if($row['role'] != 'Super Admin'):?>
                                                <a href="<?php echo ADMIN_URL;?>admin-user-edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?php echo ADMIN_URL;?>admin-user-delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                                <?php endif; ?>
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