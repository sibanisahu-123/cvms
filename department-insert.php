<?php
include "includes/pdoconnection.php";
session_start();
$conn->beginTransaction();
$cnt=0;
$duplicate="select count(*) as cnt from tbldepartment where dept_name='".$_POST['dept']."'";
foreach($conn->query($duplicate) as $var)
{
$cnt=$var['cnt'];
}
if($cnt > 0)
{
	
    $_SESSION['em'] = 'Record is already exit .';
	session_write_close();
	header('Location:department-form.php');
	}
else
{

$query="insert into tbldepartment(dept_name) value(?)";
$res=$conn->prepare($query);
$data=array($_POST['dept']);
// var_dump($query);
// exit;
$isSuccess=$res->execute($data);

if($isSuccess=true)
{
	$conn->commit();
	$_SESSION['sm'] = 'Record inserted successfully.';
	session_write_close();
	header('Location:department-form.php');

}
else
{
	$conn->rollback();
	$_SESSION['em'] = 'Failed to insert record.';
	session_write_close();
	header('Location:department-form.php');

}
}