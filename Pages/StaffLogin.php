<?php 
include('Header2.php');

if (isset($_SESSION['LoginCount'])) {
	if ($_SESSION['LoginCount']>=3) {
		echo "<script>alert('Please wait 10 Mins.')</script>";
		echo "<script>window.location='SloginTimer.php';</script>";
	}
}
else{
	$_SESSION['LoginCount']=1;
	}


if (isset($_POST['btnlogin'])) {
	$Semail=$_POST['txtSemail'];
	$Spassword=$_POST['txtSpassword'];

    $select="SELECT * from Staff 
	where Email='$Semail'  AND Password='$Spassword'";
	$ret=mysqli_query($connect,$select);
	$count=mysqli_num_rows($ret);
	if ($count>0) 
	{
		$arr=mysqli_fetch_array($ret);
		$_SESSION['StaffID']=$arr['StaffID'];
		echo "<script>alert('Login Successful.');</script>";
		//echo "<script>window.location='UserUpdate.php';</script>";	
	}
	else
	{
		$_SESSION['LoginCount']++;
		echo "<script>alert('Email or Password is wrong');</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="StaffLogin.php" method="POST">
		<table>
			<tr>
				<td>Email</td>
				<td><input type="Email" name="txtSemail" required=""></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" name="txtSpassword" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnlogin" ></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php include('Footer.php') ?>