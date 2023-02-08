<?php 
include('Header.php');
 $connect=mysqli_connect('localhost','root','','airpollutiondb');
if (isset($_POST['btnSearch'])) {
	$CityName=$_POST['txtCityName'];
	$select="SELECT * FROM Cityy WHERE CityName='$CityName'";
	$result=mysqli_query($connect,$select);
}
	else if (isset($_POST['btnShowAll'])) {
		$select="SELECT * FROM Cityy ORDER BY CityName";
		$result=mysqli_query($connect,$select);
	}
	else {
		$select="SELECT * FROM Cityy ORDER BY CityName";
		$result=mysqli_query($connect,$select);
	}
	 if (isset($_SESSION['UserID'])) {
 	$UserID=$_SESSION['UserID'];
 	$PgName="CityList.php";
 	$AccessDate=date('Y-m-d');
 	date_default_timezone_set('Asia/Yangon');
 	$AccessTime=date('h:i:sa');
 	$Insert="INSERT INTO History(PageName,AccessDate,AccessTime,UserID) VALUES ('$PgName','$AccessDate','$AccessTime','$UserID')";
 	$ret=mysqli_query($connect,$Insert); 
 }
 if (isset($_SESSION['UserID'])) {
 	$UserID=$_SESSION['UserID'];
 	$PgName="CityList.php";
 	$AccessDate=date('Y-m-d');
 	date_default_timezone_set('Asia/Yangon');
 	$AccessTime=date('h:i:sa');
 	$Insert="INSERT INTO History(PageName,AccessDate,AccessTime,UserID) VALUES ('$PgName','$AccessDate','$AccessTime','$UserID')";
 	$ret=mysqli_query($connect,$Insert); 
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="CityList.php" method="POST">
	<table>
		<tr >
			<td align="center">Search by CityName</td>
			<td align="center"><input  type="text" name="txtCityName"></td>
			<td align="center"><input  type="submit" name="btnSearch" value="Search"></td>
			<td align="center"><input type="submit" name="btnShowAll" value="Show All"></td>	
		</tr>
	</table>
	</form>

	<?php 
		 $count=mysqli_num_rows($result);
		 if ($count==0) {
		 	echo "Search record is not available";
		 }
		 else{
		 	echo "<table border='1' >
		 		<tr>
		 			<th>CityName</th>
		 			<th>Air Pollution Rate</th>
		 			<th>Description</th>

		 		</tr>";
		 		for ($i=0; $i <	$count ; $i++) { 
		 			$arr=mysqli_fetch_array($result);
		 			echo "<tr>";
		 			echo "<td align='center'>".$arr['CityName']."</td>";
		 			echo "<td align='center'>".$arr['AirPollutionRate']."</td>";
		 			echo "<td align='center'>".$arr['Description']."</td>";
		 			echo "<tr>";
		 		}
		 		echo "</table>";
		 }
	 ?>
</body>
</html>
<?php include('Footer.php') ?>
