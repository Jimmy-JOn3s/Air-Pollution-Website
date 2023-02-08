<?php
 	include('Header.php'); 
	$connect=mysqli_connect('localhost','root','','airpollutiondb');
	if (isset($_POST['btnregister'])) {
		
		$fName=$_POST['txtFullName'];
		$email=$_POST['txtEmail'];
		$password=md5($_POST['txtPassword']);
		$dob=$_POST['txtDOB'];
		$posaddress=$_POST['txtPostalAddress'];
		$poscode=$_POST['txtPostcode'];

		$select="SELECT * from User where Email='$email'";
		$ret=mysqli_query($connect,$select);
		$count=mysqli_num_rows($ret);
		if ($count>0) {
			echo "<script>alert('User Email already exists.');</script>";
			echo "<script>window.location='Home.php'</script>";

		}

		$insert="INSERT INTO User (FUllName,Email,Password,DateofBirth,PostalAddress,PostCode)VALUES ('$fName','$email','$password','$dob','$posaddress','$poscode')";
		$result=mysqli_query($connect,$insert);
		if ($result) {
			echo"<script>alert('User Register Successful.');</script>";
			echo "<script>window.location='Home.php'</script>";
		}
		else{
			echo mysqli_error($connect);
		}

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="UserRegister.php" method="Post">
			<input type="hidden" name="txtuserID" value="<?php echo $arr3['UserID'];?>">
			<table>
				
			<tr>
				<td width="50%" align="right">FullName</td>
				<td><input type="text" name="txtFullName" required></td>
				<tr>
					<td align="right">Email</td>
					<td><input type="email" name="txtEmail" required></td>

				</tr>
				<tr>
					<td align="right">Password</td>
					<td><input type="password" name="txtPassword" required></td>
				</tr>
				<tr>
					<td align="right">DateofBirth</td>
					<td><input type="date" name="txtDOB">
				</tr>
				<tr>
					<td align="right">PostalAddress</td>
					<td><textarea name="txtPostalAddress" required></textarea></td>
				</tr>
					<td align="right">PostCode</td>
					<td><input type="text" name="txtPostcode"></td>
				<tr>
					<td></td>
					<td><input type="submit" name="btnregister" value="Register"></td>
				</tr>
			</tr>
			</table>
		</form>
</body>
</html>
<?php include('Footer.php') ?>