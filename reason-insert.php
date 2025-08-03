<?php
include "includes/pdoconnection.php";
session_start();
$conn->beginTransaction();
$cnt=0;
$duplicate="select count(*) as cnt from tblreason where Reason='".$_POST['reason']."'";
foreach($conn->query($duplicate) as $var)
{
$cnt=$var['cnt'];
}
if($cnt > 0)
{
	
    $_SESSION['em'] = 'Record is already exit .';
	session_write_close();
	header('Location:reason-form.php');
	}
else
{

$query="insert into tblreason(Reason) value(?)";
$res=$conn->prepare($query);
$data=array($_POST['reason']);

$isSuccess=$res->execute($data);

if($isSuccess=true)
{
	$conn->commit();
	$_SESSION['sm'] = 'Record inserted successfully.';
	session_write_close();
	header('Location:reason-form.php');

}
else
{
	$conn->rollback();
	$_SESSION['em'] = 'Failed to insert record.';
	session_write_close();
	header('Location:reason-form.php');

}
}