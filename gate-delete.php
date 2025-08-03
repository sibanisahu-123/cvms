<?php
include "includes/pdoconnection.php";
session_start();
$conn->beginTransaction();
$query='delete from tblgate where gate_id=?';
$res=$conn->prepare($query);
$data=array($_GET['id']);

$isSuccess=$res->execute($data);

if($isSuccess=true)
{
$conn->commit();
$_SESSION['sm']='Record deleted.';
session_write_close();
header('Location:gate-form.php');

}
else
{
$conn->rollback();
$_SESSION['em']='Failed to delete record.';
session_write_close();

header('Location:gate-form.php');

}