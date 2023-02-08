<?php 
$connect=mysqli_connect("localhost","root","","airpollutiondb");
if (isset($_REQUEST['PID'])) {
	$ProductID=$_REQUEST['PID'];
	$delete="DELETE FROM Product where ProductID ='ProductID'";
	$reuslt=mysqli_query($connect,$delete);
	if ($result) {
		echo "<script>alert('Product is deleted.');</script>";
		echo "<script>window.location='View.php';</script>";
	}
}
 ?>