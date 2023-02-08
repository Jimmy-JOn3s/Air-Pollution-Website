<?php 
include('Header.php');
$connect=mysqli_connect('localhost','root','','airpollutiondb');
if (isset($_REQUEST['PID'])){
$ProductID=$_REQUEST['PID'];
$selectP="SELECT p.*, pt.* FROM product p, producttype pt WHERE p.ProductTypeID=pt.ProductTypeID";
$result3=mysqli_query($connect,$selectP);
if ($result3){
   $arr3=mysqli_fetch_array($result3);
   }
}
else {
	 echo mysqli_error($connect);
 
}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
img {
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 5px;
  width: 300px;
}
</style>
</head>
<body>
	<form action="PDetail.php" method="POST">
		<input type="hidden" name="txtProductID" value="<?php echo $arr3['ProductID']; ?>">
	<table>
		<tr>
			<td  width="50%" align="right"><img src="<?php echo $arr3['ProductImage'] ?>" width="300"></td>
			<td>
				Product Name  :<?php echo $arr3['ProductName']; ?> <br>
				Product Type  :<?php echo $arr3['Type']; ?> <br>
				Quantity      :<?php echo $arr3['Quantity']; ?> <br>
				Price         :<?php echo $arr3['Price']; ?> <br>
			</td>
		</tr>
	</table>
 </form>
</body>
</html>
<?php include('Footer.php') ?>