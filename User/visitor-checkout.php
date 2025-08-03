<?php
include "../includes/pdoconnection.php";
session_start();

$conn->beginTransaction();
$query = "update tblvisitor set outtime=?,status=? where ID=?";
$res = $conn->prepare($query);
date_default_timezone_set('Asia/kolkata');

$dateTime = date('Y-m-d H:i:s');
$data = array($dateTime,'Out', $_GET['id']);

$isSuccess = $res->execute($data);

if ($isSuccess = true) {
    $conn->commit();
    $_SESSION['sm'] = 'Record updated successfully.';
    session_write_close();
    header('Location:visitor-detail.php');
} else {
    $conn->rollback();
    $_SESSION['em'] = 'Failed to update record.';
    session_write_close();
    header('Location:visitor-detail.php');
}
