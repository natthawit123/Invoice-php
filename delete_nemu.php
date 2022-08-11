<?php 
	include('condb.php');
	$id  = $_GET["id"];
	$projact_invoice  = $_GET["projact_invoice"];


	



	$sql = "DELETE FROM `add1` WHERE id = '$id'";
	$check = mysqli_query($con,$sql) or die("Error in sql : $sql". mysqli_error($sql));



	

if($check){
echo "<script type='text/javascript'>";
echo "alert('ลบข้อมูลสำเร็จ');";
echo "window.location = 'Invoice-editnemu.php?projact_invoice=$projact_invoice'; ";
echo "</script>";
}else{
echo "<script type='text/javascript'>";
echo "window.location = '.php'; ";
echo "</script>";
}
?>