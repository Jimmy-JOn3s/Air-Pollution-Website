<?php 
include('Header.php'); 

$connect=mysqli_connect('localhost','root','','airpollutiondb');

if (isset($_SESSION['LoginCount'])) {
	if ($_SESSION['LoginCount']>=3) {
		echo "<script>alert('Take a break.Please wait 10 Mins.')</script>";
		echo "<script>window.location='LoginTimer.php';</script>";
	}
}
else{
	$_SESSION['LoginCount']=1;
	}


if (isset($_POST['btnlogin'])) {
	$email=$_POST['txtEmail'];
	$password=md5($_POST['txtPassword']);

    $select="SELECT * from User 
	where Email='$email'  AND Password='$password'";
	$ret=mysqli_query($connect,$select);
	$count=mysqli_num_rows($ret);
	if ($count>0) 
	{
		$arr=mysqli_fetch_array($ret);
		$_SESSION['UserID']=$arr['UserID'];
		echo "<script>alert('Login Successful.');</script>";	
		echo "<script>window.location='FreeGift.php';</script>";
	}
	else
	{
		$_SESSION['LoginCount']++;
		echo "<script>alert('Email or Password is wrong');</script>";
	}
}
if (isset($_SESSION['UserID'])) {
 	$UserID=$_SESSION['UserID'];
 	$PgName="UserLogin.php";
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table.center {
  margin-left:auto; 
  margin-right:auto;
}
</style>
</head>
<body>
	
	<form action="UserLogin.php" method="POST">
		<table >
			<tr>
				<td width="50%" align="right">Email</td>
				<td><input class="btmspace-15" type="Email" name="txtEmail" required=""></td>
			</tr>
			<tr>
				<td align="right">Password</td>
				<td><input class="btmspace-15" type="Password" name="txtPassword" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnlogin" value="Login"></></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php include('Footer.php') ?>