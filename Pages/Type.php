<?php 
$connect=mysqli_connect('localhost','root','','airpollutiondb');
if (isset($_POST['btnRegister'])){

 $Type=$_POST['txttype'];
$query="INSERT INTO producttype (Type) VALUES('$Type')";
$result=mysqli_query($connect,$query);
if ($result) {
	echo "<script>alert('Type register Successful.');</script>";
}
else{
	echo "<script>alert('Cannot Register.');</script>";
}
}
 ?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="Type.php" method="POST">
	<table>
		<tr>
			<td>Type</td>
			<td><input type="text" name="txttype"></td>
		</tr>
		<tr>
	 		<td></td>
	 		<td><input type="submit" name="btnRegister" value="Register"></td>
 		</tr>
	</table>
</form>
</body>
</html>