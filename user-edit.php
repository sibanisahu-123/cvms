<?php
session_start();
error_reporting(0);
include "includes/pdoconnection.php";
if (strlen($_SESSION['cvmsaid'] == 0)) {
    header('location:logout.php');
} else {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>CVSM User Forms</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <?php include_once('includes/sidebar.php'); ?>

            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <?php include_once('includes/header.php'); ?>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Edit</strong> User
                                        </div>
                                        <div class="card-body card-block">
                                            <form action="user-update.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                                                <?php
                                                $query = "SELECT * FROM `tbluser` WHERE user_id=" . $_GET['id'];

                                                foreach ($conn->query($query) as $row) {
                                                ?>
                                                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"  />
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="" class=" form-control-label">Gate</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select id="gate" name="gate" class="form-control">
                                                                <option value="">-select-</option>
                                                                <?php
                                                                $sql = "SELECT * FROM `tblgate`";
                                                                foreach ($conn->query($sql) as $var) {
                                                                ?>
                                                                    <option value="<?php echo $var['gate_id'] ?>" <?php echo $var['gate_id'] == $row['gate_id'] ? 'selected' : '' ?>><?php echo $var['gate_name'] ?></option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Full Name</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" value="<?php echo $row['name'] ?>" required="">

                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="" class=" form-control-label">Phone Number</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" class="form-control" maxlength="10" required="" value="<?php echo $row['mob'] ?>" >

                                                        </div>
                                                    </div>


                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="" class=" form-control-label">User Name</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="uname" name="uname" placeholder="user name" class="form-control" value="<?php echo $row['username'] ?>" required="">

                                                        </div>
                                                    </div>
                                                    

                                                <?php } ?>
                                                <div class="card-footer">
                                                    <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Update
                                                        </button></p>

                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <?php include_once('includes/footer.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

    </html>
    <!-- end document-->
<?php }  ?>