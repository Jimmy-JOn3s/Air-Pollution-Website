<?php 
include('Header2.php');
$connect= mysqli_connect('localhost','root','','airpollutiondb');
if (isset($_POST['btnregister'])) {
	$folder="../Images/";
	$ProductImage=$_FILES['txtproductimage']['name'];
	if ($ProductImage) {
		$filename=$folder.$ProductImage;
		$copy=copy($_FILES['txtproductimage']['tmp_name'],$filename);
		if (!$copy) {
			exit();
		}
	}
	$ProductName=$_POST['txtproductname'];
	$ProductType=$_POST['cboType'];
	$Quantity=$_POST['txtquantity'];
	$Price=$_POST['txtprice'];
	$insert="INSERT INTO product (ProductImage,ProductName,ProductTypeID,Quantity,Price) VALUES ('$filename','$ProductName','$ProductType','$Quantity','$Price')";
	$result=mysqli_query($connect,$insert);
	if ($result) {
		echo "<script>alert('Prduct register successful.');</script>";
	}
	else{
				echo "<script>alert('Cannot Register.');</script>";

	}

}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="ProductRegisteration.php" method="Post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>ProductImage</td>
				<td><input type="file" name="txtproductimage"></td>
			</tr>
			<tr>
				<td>ProductName</td>
				<td><input type="text" name="txtproductname"></td>
			</tr>
			<tr>
				<td>ProductType</td>
				<td>
					<select name="cboType">
						<?php 
							$select="SELECT * FROM producttype";
							$result1=mysqli_query ($connect,$select);
							if ($result1) {
								$count=mysqli_num_rows($result1);
								for ($i=0; $i < $count; $i++) { 
									$arr=mysqli_fetch_array($result1);
									echo "<option value='".$arr['ProductTypeID']."'>".$arr['Type']."</option>";
								}
								
							}
						 ?>
						<option></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="number" name="txtquantity"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="number" name="txtprice" required=""></td>
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