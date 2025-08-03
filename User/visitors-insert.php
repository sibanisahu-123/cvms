<?php
include "../includes/pdoconnection.php";
session_start();
$conn->beginTransaction();

$qry = "SELECT COUNT(ID) as cnt FROM `tblvisitor`";
foreach($conn->query($qry) as $var){
    $count = $var['cnt'];
}
// var_dump($count);
// exit;

$query = "insert into tblvisitor(ID,gate,FullName,Email,MobileNumber,company,Address,IdProof,Deptartment,WhomtoMeet,ReasontoMeet,purpose,no_of_person,visitorImg) value(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$res = $conn->prepare($query);
date_default_timezone_set('Asia/kolkata');

/////////////////////
$encoded_data = $_POST['webcamImg'];
$binary_data = base64_decode($encoded_data);
//.'(' . date('h:m:s A') . ')' //date('d-m-y_h:i:s_A').'.jpeg';
$GatepassNo = $count+1;
$fileName =  $GatepassNo.'.jpeg';
file_put_contents('VisitorImg/' . $fileName, $binary_data);

$data = array($count+1,$_SESSION['ugate'],$_POST['fullname'], $_POST['email'], $_POST['mobilenumber'], $_POST['Companyname'], $_POST['address'], 
$_POST['IdProof'], $_POST['dept'], $_POST['whomtomeet'], $_POST['reasontomeet'], $_POST['purpose'], $_POST['cntperson'], $fileName);

$isSuccess = $res->execute($data);
// var_dump($data);
// exit;

if ($isSuccess = true) {
    $conn->commit();
    $_SESSION['sm'] = 'Record inserted successfully.';
    session_write_close();
    header('Location:visitor-detail.php');
} else {
    $conn->rollback();
    $_SESSION['em'] = 'Failed to insert record.';
    session_write_close();
    header('Location:visitor-detail.php');
}
