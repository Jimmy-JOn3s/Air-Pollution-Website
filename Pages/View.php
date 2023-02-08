<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1">
	<tr>
		<td>ProductID</td>
		<td>ProductImage</td>
		<td>ProductName</td>
		<td>ProductType</td>
		<td>Quantity</td>
		<td>Price</td>
		<td>Action</td>
	</tr>
	<?php 
	$connect=mysqli_connect("localhost","root","","airpollutiondb");
	$select="SELECT p.*, pt.* FROM Product p, producttype pt WHERE p.ProductType=pt.ID";
	$ret=mysqli_query($connect,$select);
	if ($ret) {
		$count=mysqli_num_rows($ret);
		for ($i=0; $i < $count ; $i++) { 
			$arr=mysqli_fetch_array($ret);
			echo "<tr>";
			echo "<td>".$arr['ProductID']."</td>";
			echo "<td><img src='".$arr['ProductImage']."'width='150px '</td>";
			echo "<td>".$arr['ProductName']."</td>";
			echo "<td>".$arr['ProductType']."</td>";
			echo "<td>".$arr['Quantity']."</td>";
			echo "<td>".$arr['Price']."</td>";
			echo "<td><a href='Update.php?PID=".$arr['ProductID']."' >Update</a> || <a href='Delete.php?PID=".$arr['ProductID']."'>Delete</a></td>";
			echo  "</tr>";
			}
	}
	else
		{
		  mysqli_error ($connect);
		}
?>
</table>
</body>
</html>