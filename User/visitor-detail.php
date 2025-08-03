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
                  <h2>Today/Current Visitors Lists</h2>
                  <div class="table-responsive table--no-card m-b-30 mt-4">
                    <table class="table table-border table-earning">
                      <thead>
                        <tr>

                          <th>S.NO</th>
                          <!-- <th>Visitor ID</th> -->
                          <th>In date/ Time</th>
                          <th>Out date/ Time</th>
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>Department</th>
                          <th>Meet to Person</th>

                          <th>View</th>
                          <th>status</th>


                        </tr>
                      </thead>

                      <?php
                      $sl = 1;
                      $query = "SELECT tblvisitor.*,tbldepartment.dept_name,tblemployee.emp_name,tblreason.Reason FROM `tblvisitor` INNER JOIN tbldepartment on tblvisitor.Deptartment = tbldepartment.dept_id INNER JOIN tblemployee ON tblvisitor.WhomtoMeet= tblemployee.emp_id INNER JOIN tblreason ON tblvisitor.ReasontoMeet= tblreason.reason_id where date(tblvisitor.EnterDate)=CURDATE() AND tblvisitor.gate=" . $_SESSION['ugate'] . " order by tblvisitor.Id = 'DESC'";
                      // var_dump($query);
                      foreach ($conn->query($query) as $row) {

                      ?>
                        <?php if ($row['status'] == 'Out') { ?>
                          <tr style="background-color: #C2F091;">
                          <?php } else { ?>
                          <tr style="background-color: #FFFFFF;">
                          <?php } ?>
                          <td><?php echo $sl++; ?></td>
                          <!-- <td><?php echo $row['ID']; ?></td> -->
                          <td><?php echo date('d-m-Y H:s:i', strtotime($row['EnterDate'])); ?> </td>
                          <td>
                            <?php if ($row['outtime'] == '') {
                              echo '';
                            } else {
                              echo date('d-m-Y H:s:i', strtotime($row['outtime']));
                            } ?>
                          </td>
                          <td><?php echo $row['FullName']; ?></td>

                          <td><?php echo $row['MobileNumber']; ?></td>
                          <td><?php echo $row['dept_name']; ?></td>
                          <td><?php echo $row['emp_name']; ?></td>

                          <td>
                            <a href="visitor-view.php?id=<?php echo $row['ID']; ?>" title="View Full Details">
                              <i class="fa fa-eye fa-1x"></i>
                            </a> &nbsp;
                            <a href="gatepass.php?id=<?php echo $row['ID']; ?>" title="View Full Details">
                              <i class="fa fa-print fa-1x"></i>
                            </a>
                          </td>
                          <?php if ($row['status'] == 'In') { ?>
                            <td>
                              <a href="visitor-checkout.php?id=<?php echo $row['ID']; ?>" class="btn btn-warning">Check Out</a>
                            </td>
                          <?php } else { ?>
                            <td></td>
                          <?php } ?>
                          </tr>
                        <?php } ?>
                    </table>
                  </div>
                </div>

              </div>


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