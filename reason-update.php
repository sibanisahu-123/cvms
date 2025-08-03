<?php
include "includes/pdoconnection.php";
session_start();

$conn->beginTransaction();
$query = "update tblreason set Reason=?,status=? where reason_id=?";
$res = $conn->prepare($query);
$data = array($_POST['reason'],$_POST['status'], $_POST['id']);

$isSuccess = $res->execute($data);

if ($isSuccess = true) {
    $conn->commit();
    $_SESSION['sm'] = 'Record updated successfully.';
    session_write_close();
    header('Location:reason-form.php');
} else {
    $conn->rollback();
    $_SESSION['em'] = 'Failed to update record.';
    session_write_close();
    header('Location:reason-form.php');
}
