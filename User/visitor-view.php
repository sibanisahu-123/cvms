<?php
session_start();
error_reporting(0);
include "../includes/pdoconnection.php";
if (strlen($_SESSION['uid'] == 0)) {
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
        <title>CVSM Visitors Forms</title>

        <!-- Fontfaces CSS-->
        <link href="../css/font-face.css" rel="stylesheet" media="all">
        <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="../css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <?php include_once('sidebar.php'); ?>

            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <?php include_once('header.php'); ?>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <h3>Visitor Details :</h3>
                            <?php
                            $getId = $_GET['id'];
                            $query = "SELECT tblvisitor.*,tbldepartment.dept_name,tblemployee.emp_name,tblreason.Reason FROM `tblvisitor` INNER JOIN tbldepartment on tblvisitor.Deptartment = tbldepartment.dept_id INNER JOIN tblemployee ON tblvisitor.WhomtoMeet= tblemployee.emp_id INNER JOIN tblreason ON tblvisitor.ReasontoMeet= tblreason.reason_id WHERE tblvisitor.ID='$getId'";

                            foreach ($conn->query($query) as $row) {
                            ?>
                                <table width="100%" class="table table-bordered mg-b-0">
                                    <tr>
                                        <td width="20%">Full Name</td>
                                        <td width="2%">:</td>
                                        <td width="58%"><?php echo $row['FullName']; ?></td>
                                        <td width="30%" rowspan="10">
                                            <img src="VisitorImg/<?php echo $row['visitorImg'] ?>" class="img-thumbnail" alt="Cinque Terre">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gate pass No</td>
                                        <td>:</td>
                                        <td><?php echo $row['ID']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Company Name</td>
                                        <td>:</td>
                                        <td><?php echo $row['company']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?php echo $row['Email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>ID Proof</td>
                                        <td>:</td>
                                        <td><?php echo $row['IdProof']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number</td>
                                        <td>:</td>
                                        <td><?php echo $row['MobileNumber']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td><?php echo $row['Address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Whom to Meet</td>
                                        <td>:</td>
                                        <td><?php echo $row['emp_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deptartment</td>
                                        <td>:</td>
                                        <td><?php echo $row['dept_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Reason to Meet</td>
                                        <td>:</td>
                                        <td><?php echo $row['Reason']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No of Person</td>
                                        <td>:</td>
                                        <td><?php echo $row['no_of_person']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Issue Date</td>
                                        <td>:</td>
                                        <td><?php echo date('d-m-Y H:s:i',strtotime($row['EnterDate'])); ?> </td>
                                    </tr>
                                </table>
                            <?php } ?>
                            <center><a href="visitor-detail.php" class="btn btn-sm btn-primary">Back</a></center>
                            <?php include_once('footer.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jquery JS-->
        <script src="../vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="../vendor/slick/slick.min.js">
        </script>
        <script src="../vendor/wow/wow.min.js"></script>
        <script src="../vendor/animsition/animsition.min.js"></script>
        <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="../vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="../vendor/circle-progress/circle-progress.min.js"></script>
        <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="../vendor/select2/select2.min.js">
        </script>
        <!-- Main JS-->
        <script src="../js/main.js"></script>


    </body>

    </html>
    <!-- end document-->
<?php }  ?>