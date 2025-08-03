<?php
session_start();
error_reporting(0);
include('includes/pdoconnection.php');
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
        <title>CVSM Department Forms</title>

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
                                    <?php
                                    if (isset($_SESSION['sm'])) { ?>
                                        <h5 class="text-success text-center">
                                            <?php
                                            echo $_SESSION['sm'];
                                            unset($_SESSION['sm']);
                                            ?>
                                        </h5>
                                    <?php }
                                    if (isset($_SESSION['em'])) { ?>
                                        <h5 class="text-danger text-center">
                                            <?php
                                            echo $_SESSION['em'];
                                            unset($_SESSION['em']);
                                            ?>
                                        </h5>
                                    <?php } ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Add</strong> Department
                                        </div>
                                        <div class="card-body card-block">
                                            <form action="department-insert.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <p style="font-size:16px; color:red" align="center">
                                                    <?php if ($msg) {
                                                        echo $msg;
                                                    }  ?> </p>

                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Department <span style="color: red;">* </span>:</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="dept" name="dept" class="form-control" placeholder="Enter Department Name" require>
                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Submit
                                                        </button></p>

                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Department Name</th>
                                                    <th>status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tr>
                                            </thead>
                                            <?php
                                            $sl = 1;
                                            $query = "select * from tbldepartment";

                                            foreach ($conn->query($query) as $row) {

                                            ?>

                                                <tr>
                                                    <td><?php echo $sl++; ?></td>

                                                    <td><?php echo $row['dept_name']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td>
                                                        <a href="department-edit.php?id=<?php echo $row['dept_id']; ?>" title="View Full Details">
                                                            <i class="fa fa-edit fa-1x"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="department-delete.php?id=<?php echo $row['dept_id']; ?>" title="View Full Details" onClick="return confirm('Are you sure want to delete the record?')">
                                                            <i class="fa fa-trash fa-1x"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
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
        <script>
            $(document).ready(function() {
                $('#submit').click(function() {
                    if ($('#dept').val() == '') {
                        alert("Please Insert Field");
                        $("#dept").focus();
                        return false;
                    }
                })
            })
        </script>
    </body>

    </html>
    <!-- end document-->
<?php }  ?>