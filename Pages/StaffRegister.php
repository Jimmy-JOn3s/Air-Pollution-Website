<?php 
include('Header2.php');
 if (isset($_POST['btnregister'])) {
		
		$Sname=$_POST['txtSname'];
		$Semail=$_POST['txtSemail'];
		$Spassword=$_POST['txtSpassword'];
		$Sdob=$_POST['txtSDOB'];
		$Saddress=$_POST['txtSaddress'];
		$Sphno=$_POST['txtSphno'];

		$select="SELECT * from Staff where Email='$Semail'";
		$ret=mysqli_query($connect,$select);
		$count=mysqli_num_rows($ret);
		if ($count>0) {
			echo "<script>alert('Staff Email already exists.');</script>";

		}

		$insert="INSERT INTO Staff (StaffName,Email,Password,DateofBirth,Address,PhoneNumber)VALUES ('$Sname','$Semail','$Spassword','$Sdob','$Saddress','$Sphno')";
		$result=mysqli_query($connect,$insert);
		if ($result) {
			echo"<script>alert('Staff Register Successful.');</script>";
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
	<form action="StaffRegister.php" method="Post">
			<table>
				
			<tr>
				<td>StaffName</td>
				<td><input type="text" name="txtSname" required></td>
			</tr>	
			<tr>
				<td>Email</td>
				<td><input type="email" name="txtSemail" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="txtSpassword" required></td>
			</tr>
			<tr>
				<td>DateofBirth</td>
				<td><input type="date" name="txtSDOB">
			</tr>
			<tr>
				<td>Address</td>
				<td><textarea name="txtSaddress" required></textarea></td>
			</tr>
			<tr>
				<td>PhoneNumber</td>
				<td><input type="text" name="txtSphno"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnregister" value="Register"></td>
			</tr>
			</table>
		</form>
</body>
</html>
<?php include('Footer.php') ?>