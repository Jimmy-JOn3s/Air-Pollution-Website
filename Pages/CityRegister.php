<?php 
include('Header2.php');
$connect=mysqli_connect('localhost','root','','airpollutiondb');
if (isset($_POST['btnRegister'])){
 $CityID=$_POST['txtCityID'];
 $CityName=$_POST['txtCityName'];
$AirPollutionRate=$_POST['txtAirPollutionRate'];
$Description=$_POST['txtDescription'];
$query="INSERT INTO Cityy VALUES('$CityID','$CityName','$AirPollutionRate','$Description')";
$result=mysqli_query($connect,$query);
if ($result) {
	echo "<script>alert('Register of City Successful.')</script>";
}
else{
	echo "<script>alert('Cannot Register.')</script>";
}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="CityRegister.php" method="POST" >
	<table>
		<tr>
			<td>City ID</td>
			<td><input type="text" name="txtCityID" required></td>
		</tr>
		<tr>
			<td>City Name</td>
			<td><input type="text" name="txtCityName" required></td>
		</tr>
		<tr>
			<td>Air Pollution Rate</td>
			<td><input type="text" name="txtAirPollutionRate" required></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input type="text" name="txtDescription" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnRegister" value="Register" required></td>
		</tr>
	</table>
</form>
</body>
<<?php include('Footer.php') ?>