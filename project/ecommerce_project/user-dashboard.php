<?php include 'header.php'; ?>

<?php 
    if(!isset($_SESSION['user'])){
        header('location:'.BASE_URL.'login.php');
        exit;
    }
?>

<!-- breadcrumb start -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
            <li class="ml_10 mr_10">
                <i class="fas fa-chevron-right"></i>
            </li>
            <li>User Dashboard</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<main id="MainContent" class="content-for-layout">
    <div class="article-page mt_40">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-12 col-12">
                    <div class="user-menu">
                        <?php include "user-sidebar.php"; ?>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 col-12 user-content">
                    <h2 class="mb_30">Welcome <?php echo $_SESSION['user']['name']; ?> to our dashboard!</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="item-box item-1" style="text-align: center;padding: 20px 30px;color: #fff;background: #36a468;">
                                <h3>Active Orders</h3>
                                <p style="font-size:20px;font-width:bold;">5</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item-box item-2" style="text-align: center;padding: 20px 30px;color: #fff;background: #1092ca;">
                                <h3>Pending Orders</h3>
                                <p style="font-size:20px;font-width:bold;">2</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>            
</main>


<?php include "footer.php"; ?>