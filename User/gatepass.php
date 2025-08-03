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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gate Pass</title>
    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-1">
                <img src="../images/icon/download.jpg" alt="" height="100px">
            </div>
            <div class="col-md-10 text-center">
                <h2>
                    Interface Software Services
                </h2>
                <h5>
                    491/1, Maharishi College Rd, Saheed Nagar, Bhubaneswar, Odisha 751007
                </h5>
                <h4>VISITOR GATE PASS</h4>
            </div>
        </div>
        <hr>
        <?php
        $getId = $_GET['id'];
        $query = "SELECT tblvisitor.*,tbldepartment.dept_name,tblemployee.emp_name,tblreason.Reason FROM `tblvisitor` INNER JOIN tbldepartment on tblvisitor.Deptartment = tbldepartment.dept_id INNER JOIN tblemployee ON tblvisitor.WhomtoMeet= tblemployee.emp_id INNER JOIN tblreason ON tblvisitor.ReasontoMeet= tblreason.reason_id WHERE tblvisitor.ID='$getId'";

        foreach ($conn->query($query) as $row) {
        ?>

        <div class="row">
            <div class="col-md-2">
                <strong>Gate Pass No. : <?php echo $row['ID']; ?> </strong>
            </div>
            <div class="col-md-8"></div>
            <div class="col-md-2">
                <strong>Issued On : <?php echo date('d-m-Y H:s:i',strtotime($row['EnterDate'])); ?> </strong>
            </div>
        </div>
        <hr>
        <table width="100%">
            <tr>
                <td width="20%">Full Name</td>
                <td width="2%">:</td>
                <td width="58%"><?php echo $row['FullName']; ?></td>
                <td width="30%" rowspan="10">
                <img src="VisitorImg/<?php echo $row['visitorImg'] ?>" class="img-thumbnail" alt="Cinque Terre">
                </td>
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
        </table>
        <?php } ?>

        <h6 class="text-right">Signature of issuing Officer with stamp</h6>
        <hr>
        <h6 class="text-center">(To be got signed by the Officer visited and handed over to the entry on leaving the Secretariat permises)</h6>
        <div class="text-center">
        <input type="button" onclick="window.print()" class="btn btn-sm btn-primary" value="Print">
        <a href="visitor-detail.php" class="btn btn-sm btn-success">Back</a>
        </div>
        
    </div>
</body>

</html>
<?php } ?>