<?php
include "includes/pdoconnection.php";
session_start();

$conn->beginTransaction();
$query = "update tblemployee set emp_name=?,mob=?,email=?,gender=?,dept_id=? where emp_id=?";
$res = $conn->prepare($query);
$data = array($_POST['fullname'],$_POST['mobilenumber'],$_POST['email'],$_POST['gender'],$_POST['dept'], $_POST['id']);

$isSuccess = $res->execute($data);


if ($isSuccess = true) {
    $conn->commit();
    $_SESSION['sm'] = 'Record updated successfully.';
    session_write_close();
    header('Location:employee-details.php');
} else {
    $conn->rollback();
    $_SESSION['em'] = 'Failed to update record.';
    session_write_close();
    header('Location:employee-details.php');
}
