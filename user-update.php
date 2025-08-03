<?php
include "includes/pdoconnection.php";
session_start();

$conn->beginTransaction();
$query = "update tbluser set name=?,mob=?,username=?,gate_id=? where user_id=?";
$res = $conn->prepare($query);
$data = array($_POST['fullname'],$_POST['mobilenumber'],$_POST['uname'],$_POST['gate'], $_POST['id']);

$isSuccess = $res->execute($data);

if ($isSuccess = true) {
    $conn->commit();
    $_SESSION['sm'] = 'Record updated successfully.';
    session_write_close();
    header('Location:user-details.php');
} else {
    $conn->rollback();
    $_SESSION['em'] = 'Failed to update record.';
    session_write_close();
    header('Location:user-details.php');
}
