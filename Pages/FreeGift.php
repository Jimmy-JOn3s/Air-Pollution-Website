<?php 
include('Header.php');
if (isset($_SESSION['UserID'])) {
	$UserID=$_SESSION['UserID'];
	 $query="SELECT * FROM User WHERE UserID='$UserID'";
	$result=mysqli_query($connect,$query);
	$arr=mysqli_fetch_array($result);
	if ($arr['FreeGift']=='Claim') {
		echo "<script>alert('Already Claimed');</script>";
		echo "<script>window.location='Home.php'</script>";
		
	}
}
if (isset($_POST['btnGet'])) {
	$UserID=$_SESSION['UserID'];
	$query="UPDATE User SET FreeGift='Claim' WHERE UserID='$UserID'";
	$result=mysqli_query($connect,$query);
	if ($result) {
		echo "<script>alert('Claimed Successful');</script>";
		echo "<script>window.location='Home.php'</script>";
	}
}
if (isset($_SESSION['UserID'])) {
 	$UserID=$_SESSION['UserID'];
 	$PgName="FreeGift.php";
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
 	<form action="FreeGift.php"	method="Post">
 		<table align="center">
 		<tr>
 			<td width="50%" align="left"><img src="../Images/starter-outdoor-kit-portable-monitor.jpg" width="300px"></td>
 		</tr>
 		<tr>
 			<td align="left">Outdoor Air Quality Test Kit pro </td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="btnGet" value="Get"></td>
 		</tr>
 	</table>
 </form> 
 	
 </body>
 </html>
 <?php include('Footer.php') ?>