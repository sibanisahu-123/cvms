<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {

    $eid = $_GET['editid'];

    $remark = $_POST['remark'];
    $query = mysqli_query($con, "update tblvisitor set remark='$remark' where  ID='$eid'");


    if ($query) {
      $msg = "Visitors Remark has been Updated.";
    } else {
      $msg = "Something Went Wrong. Please try again";
    }
  }

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
      <!-- END HEADER MOBILE-->

      <!-- MENU SIDEBAR-->

      <!-- END MENU SIDEBAR-->

      <!-- PAGE CONTAINER-->
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
                      <strong>Visitor</strong> Details
                    </div>
                    <div class="card-body card-block">

                      <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                              echo $msg;
                                                                            }  ?> </p>

                      <?php
                      $eid = $_GET['editid'];
                      $ret = mysqli_query($con, "SELECT tblvisitor.*,tbldepartment.dept_name,tblemployee.emp_name,tblreason.Reason FROM `tblvisitor` INNER JOIN tbldepartment on tblvisitor.Deptartment = tbldepartment.dept_id INNER JOIN tblemployee ON tblvisitor.WhomtoMeet= tblemployee.emp_id INNER JOIN tblreason ON tblvisitor.ReasontoMeet= tblreason.reason_id  WHERE tblvisitor.ID='$eid'");
                      $cnt = 1;
                      while ($row = mysqli_fetch_array($ret)) {

                      ?>
                        <center>
                          <img src="User/VisitorImg/<?php echo $row['visitorImg'] ?>" class="img-thumbnail" alt="<?php echo $row['FullName']; ?>">
                        </center>
                        <table border="1" class="table table-bordered mg-b-0 mt-3">
                          <tr>
                            <th>Full Name</th>
                            <td><?php echo $row['FullName']; ?></td>
                          </tr>
                          <tr>
                            <th>Company Name</th>
                            <td><?php echo $row['company']; ?></td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td><?php echo $row['Email']; ?></td>
                          </tr>
                          <tr>
                            <th>ID Proof</th>
                            <td><?php echo $row['IdProof']; ?></td>
                          </tr>
                          <tr>
                            <th>Mobile Number</th>
                            <td><?php echo $row['MobileNumber']; ?></td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td><?php echo $row['Address']; ?></td>
                          </tr>
                          <tr>
                            <th>Whom to Meet</th>
                            <td><?php echo $row['emp_name']; ?></td>
                          </tr>
                          <tr>
                            <th>Deptartment</th>
                            <td><?php echo $row['dept_name']; ?></td>
                          </tr>
                          <tr>
                            <th>Reason to Meet</th>
                            <td><?php echo $row['Reason']; ?></td>
                          </tr>
                          <tr>
                            <th>Vistor Entring Time</th>
                            <td><?php echo date('d-m-Y H:s:i', strtotime($row['EnterDate'])); ?> </td>
                          </tr>
                          <tr>
                            <th>Vistor Out Time</th>
                            <td>
                              <?php if ($row['outtime'] == '') {
                                echo '';
                              } else {
                                echo date('d-m-Y H:s:i', strtotime($row['outtime']));
                              } ?>
                            </td>
                          </tr>

                          <tr>
                            <th>No of Person</th>
                            <td><?php echo $row['no_of_person']; ?></td>
                          </tr>
                        </table>
                    </div>

                  </div>

                </div>
              </div>

              <?php include_once('includes/footer.php'); ?>
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
<?php }  ?>