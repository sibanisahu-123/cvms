<option>-select employee-</option>
<?php
include "includes/pdoconnection.php";
$sql="select emp_name,emp_id from tblemployee where dept_id=".$_POST['dept_id'];
$emp=$conn->query($sql);
foreach($emp as $var)
{
?>
<option value="<?php echo $var['emp_id'];?>"><?php echo $var['emp_name'];?>
</option>
<?php
}
?>