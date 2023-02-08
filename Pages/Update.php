<?php 
include('Header.php');
$connect=mysqli_connect("localhost","root","","airpollutiondb");
if (isset($_REQUEST['PID'])) {
	$ProductID=$_REQUEST['PID'];
	$selectP="SELECT p.*, pt.* FROM Product p, producttype pt WHERE p.ProductID='$ProductID' AND p.ProductType=pt.ID";
	$result3=mysqli_query($connect,$selectP);
	if ($result3) {
		$arr3=mysqli_fetch_array($result3);
		}
	}
	if (isset($_POST['btnUpdate'])) {
		$PID=$_POST['txtproductid'];
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
	if ($ProductImage) {
	 $query="UPDATE Product SET ProductImage='$filename',
		ProductName='$ProductName',ProductType='$ProductType',Quantity='$Quantity',
			Price='$Price'
			where ProductID='$PID'";
			$result=mysqli_query($connect,$query);
			if ($result) {
				echo "<script>alert('Product data is updated');</script>";
				echo "<script>window.location='View.php';</script>";
			}
		
		else{
			echo  "<script>alert('Product data is not updated');</script>";
		}
	}

}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="Update.php" method="Post" enctype="multipart/form-data">
		<input type="hidden" name="txtproductid" value="<?php echo $arr3['ProductID'];?>">
		<table>
			<tr>
				<td>ProductImage</td>
				<td><input type="file" name="txtproductimage" value="<?php echo $arr3['ProductImage'];?>"></td>
			</tr>
			<tr>
				<td>ProductName</td>
				<td><input type="text" name="txtproductname" value="<?php echo $arr3['ProductName'];?>"></td>
			</tr>
			<tr>
				<td>ProductType</td>
				<td>
					<select name="cboType">
						<option value="<?php echo $arr3['ID'] ?>"><?php echo $arr3 ['Type'] ?></option>

						<?php 
							$select="SELECT * FROM producttype";
							$result1=mysqli_query ($connect,$select);
							if ($result1) {
								$count=mysqli_num_rows($result1);
								for ($i=0; $i < $count; $i++) { 
									$arr=mysqli_fetch_array($result1);
									echo "<option value='".$arr['ID']."'>".$arr['Type']."</option>";
								}
								
							}
						 ?>
						<option></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="number" name="txtquantity" value="<?php echo $arr3['Quantity'];?>"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="number" name="txtprice" value="<?php echo $arr3['Price'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnUpdate" value="Update"></td>
			</tr>
		</table>

	</form>
</body>
</html>
<?php include('Footer.php') ?>