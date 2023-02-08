<?php 
include('Header.php'); 
	$connect=mysqli_connect('localhost','root','','airpollutiondb');
	if (isset($_SESSION['UserID'])) {
 	$UserID=$_SESSION['UserID'];
 	$PgName="PDisplay.php";
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
	<style>
img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 300px;
}
</style>
</head>
<body>
	<table>
		<tr>
			<?php 
				$select="SELECT * FROM Product";
				$result=mysqli_query($connect,$select);
				if ($result) {
					$count=mysqli_num_rows($result);
					for ($i=0; $i < $count ; $i+=3) { 
						$selectD="SELECT * FROM Product LIMIT $i,3";
						$resultD=mysqli_query($connect,$selectD);
						$countD=mysqli_num_rows($resultD);
						echo"<tr>";
						for ($j=0; $j < $countD ; $j++) { 
							$arr=mysqli_fetch_array($resultD);
							echo "<td>
									<img src='".$arr['ProductImage']."' width='150px'>
									<br>
									<a href='PDetail.php?PID=".$arr['ProductID']."'>".$arr['ProductName']."</a>
									<br>
									".$arr['Price']."
									</td>";
						}
						echo "</tr>";
					}
				}
				else{
					echo_mysqli_error($connect);
				}
			 ?>
		</tr>
	</table>
</body>
</html>
<?php 
	include('Footer.php') 
 ?>