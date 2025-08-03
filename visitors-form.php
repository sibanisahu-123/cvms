<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        $cvmsaid = $_SESSION['cvmsaid'];
        $fullname = $_POST['fullname'];

        $mobnumber = $_POST['mobilenumber'];
        $email = $_POST['email'];
        $add = $_POST['address'];
        $whomtomeet = $_POST['whomtomeet'];
        $department = $_POST['department'];
        $reasontomeet = $_POST['reasontomeet'];
        $query = mysqli_query($con, "insert into tblvisitor(FullName,Email,MobileNumber,Address,WhomtoMeet,Deptartment,ReasontoMeet) value('$fullname','$email','$mobnumber','$add','$whomtomeet','$department','$reasontomeet')");

        if ($query) {
            $msg = "Visitors Detail has been added.";
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
                                            <strong>Add</strong> New Visitors
                                        </div>
                                        <div class="card-body card-block">
                                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                                            echo $msg;
                                                                                                        }  ?> </p>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="text-input" class=" form-control-label">Full Name</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" required="">

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="email-input" class=" form-control-label">Email Input</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" required="">

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="password-input" class=" form-control-label">Phone Number</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" class="form-control" maxlength="10" required="">

                                                            </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="textarea-input" class=" form-control-label">Address</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <textarea name="address" id="address" rows="4" placeholder="Enter Visitor Address..." class="form-control" required=""></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="password-input" class=" form-control-label">Whom to Meet</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="text" id="whomtomeet" name="whomtomeet" placeholder="Whom to Meet" class="form-control" required="">

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="password-input" class=" form-control-label">Department</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="text" id="department" name="department" placeholder="Department" class="form-control" required="">

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="password-input" class=" form-control-label">Reason To Meet</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="text" id="reasontomeet" name="reasontomeet" placeholder="Reason To Meet" class="form-control" required="">

                                                            </div>
                                                        </div>

                                                        <div class="card-footer">
                                                            <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Submit
                                                                </button></p>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="my_camera" height="240" width="240"></div>
                                                        <input id="webcamImg" type="hidden" name="webcamImg" value="" />
                                                        <button type="button" class="btn btn-sm btn-primary btn-block" onClick="take_snapshot()"> <i class='fas fa-camera'></i>&nbsp; &nbsp;CAPTURE</button>
                                                        <br>
                                                        <div id="captured_image">
                                                            <img src="images/icon/user.jpg" height="200px" width="240px" class="img-thumbnail">
                                                        </div>
                                                    </div>
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
        <!-- webcam -->
        <script type="text/javascript" src="js/webcamjs/webcam.min.js"></script>

        <script language="JavaScript">
            Webcam.set({
                width: 220,
                height: 200,
                image_format: 'jpeg',
                jpeg_quality: 40
            });
            Webcam.attach('#my_camera');

            function take_snapshot() {

                var id = document.getElementById('captured_image').innerHTML = '';

                Webcam.snap(function(data_uri) {
                    var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                    document.getElementById('webcamImg').value = raw_image_data;

                    document.getElementById('captured_image').innerHTML =
                        '<img src="' + data_uri + '"/>';
                });

            }
        </script>

    </body>

    </html>
    <!-- end document-->
<?php }  ?>