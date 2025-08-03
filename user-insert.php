<?php
include "includes/pdoconnection.php";
session_start();
$conn->beginTransaction();
$cnt=0;
$duplicate="select count(*) as cnt from tbluser where mob='".$_POST['mob']."'";
foreach($conn->query($duplicate) as $var)
{
$cnt=$var['cnt'];
}
if($cnt > 0)
{
	
    $_SESSION['em'] = 'Record is already exit .';
	session_write_close();
	header('Location:user-details.php');
	}
else
{

$query="insert into tbluser(name,mob,username,password,gate_id) value(?,?,?,?,?)";
$res=$conn->prepare($query);
$data=array($_POST['fullname'],$_POST['mobilenumber'],$_POST['uname'],$_POST['pwd'],$_POST['gate']);
// var_dump($query);
// exit;
$isSuccess=$res->execute($data);

if($isSuccess=true)
{
	$conn->commit();
	$_SESSION['sm'] = 'Record inserted successfully.';
	session_write_close();
	header('Location:user-details.php');

}
else
{
	$conn->rollback();
	$_SESSION['em'] = 'Failed to insert record.';
	session_write_close();
	header('Location:user-details.php');

}
}