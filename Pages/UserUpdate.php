<?php
include('Header.php');
 if (!isset($_SESSION['UserID'])) {
 	echo "<script>alert('Please login first.');</script>";
 	echo "<script>window.location='UserLogin.php';</script>";
 	
 }
 else{
	$ID=$_SESSION['UserID'];
	$select="SELECT * FROM User where UserID='$ID'";
	$result=mysqli_query($connect,$select);
	$count=mysqli_num_rows($result);
	if ($count>1) 
	{
		$arr=mysqli_fetch_array($result);
		$_SESSION['UserID']=$arr['UserID'];
		echo "<script>alert('Login Successful.');</script>";
		echo "<script>window.location='UserUpdate.php';</script>";	
	}
	
}
if (isset($_POST['btnUpdate'])) {
		$fName=$_POST['txtFullName'];
		$email=$_POST['txtEmail'];
		$password=md5($_POST['txtPassword']);
		$dob=$_POST['txtDOB'];
		$posaddress=$_POST['txtPostalAddress'];
		$poscode=$_POST['txtPostcode'];

	$update="UPDATE User SET FullName='$fName', Email='$email', Password='$password', DateofBirth='$dob', PostalAddress='$posaddress', PostCode='$poscode' WHERE UserID='$ID' ";
	$ret=mysqli_query($connect,$update);
	if ($ret) {
		echo "<script>alert('User data is updated');</script>";
	}
}
if (isset($_SESSION['UserID'])) {
 	$UserID=$_SESSION['UserID'];
 	$PgName="UserUpdate.php";
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
<form action="UserUpdate.php" method="POST">
<table>
	<tr>
				<td width="50%" align="right">FullName</td>
				<td><input type="text" name="txtFullName" required value="<?php echo $arr['FullName']; ?>"></td>
				<tr>
					<td align="right">Email</td>
					<td><input type="email" name="txtEmail" required value="<?php echo $arr['Email']; ?>"></td>

				</tr>
				<tr>
					<td align="right">Password</td>
					<td><input type="password" name="txtPassword" required value="<?php echo $arr['Password']; ?>"></td>
				</tr>
				<tr>
					<td align="right">DateofBirth</td>
					<td><input type="date" name="txtDOB" value="<?php echo $arr['DateofBirth']; ?>">
				</tr>
				<tr>
					<td align="right">PostalAddress</td>
					<td><textarea name="txtPostalAddress" value="<?php echo $arr['PostalAddress']; ?>"></textarea></td>
				</tr>
					<td align="right">PostCode</td>
					<td><input type="text" name="txtPostcode" value="<?php echo $arr['PostCode']; ?>"></td>
				<tr>
					<td></td>
					<td><input type="submit" name="btnUpdate" value="Update"></td>
				</tr>
			</tr>
			
</table>
</form>
</body>
</html>
<?php include('Footer.php') ?>