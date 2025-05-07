<?php include 'header.php';?>
<?php include 'top.php'; ?>

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

                                $q = $pdo->prepare("SELECT * FROM admins ORDER BY id ASC");
                                $q->execute();
                                $result = $q->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['role'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                            <td>
                                                <a href="" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="" class="btn btn-danger btn-sm">Delete</a>
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