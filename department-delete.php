<?php
include "includes/pdoconnection.php";
session_start();
$conn->beginTransaction();
$query='delete from tbldepartment where dept_id=?';
$res=$conn->prepare($query);
$data=array($_GET['id']);
//var_dump($data);
//exit;
$isSuccess=$res->execute($data);
//var_dump($isSuccess);
//exit;
if($isSuccess=true)
{
$conn->commit();
$_SESSION['sm']='Record deleted.';
session_write_close();
header('Location:department-form.php');

}
else
{
$conn->rollback();
$_SESSION['em']='Failed to delete record.';
session_write_close();

header('Location:department-form.php');

}