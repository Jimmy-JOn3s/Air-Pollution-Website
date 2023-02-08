<?php 
include('Header.php');
$connect=mysqli_connect('localhost','root','','airpollutiondb');
if (isset($_SESSION['UserID'])) {
	$UserID=$_SESSION['UserID'];
	$query="SELECT * FROM History where UserID='$UserID'";
	$result= mysqli_query($connect,$query);
	$count=mysqli_num_rows($result);
	}
	else{
		echo "<script>alert('Please Login First.');</script>";
		echo "<script>window.location='UserLogin.php';</script>";
	}
	if (isset($_REQUEST['HID'])) {
		$HistoryID=$_REQUEST['HID'];
		$query1="DELETE FROM History WHERE HistoryID='$HistoryID'";
		$result1=mysqli_query($connect,$query1);
		if ($result1) {
			echo "<script>window.location='ViewHistory.php';</script>";
		}
	}
	if (isset($_POST['btnClearAll'])) {
		$query2="DELETE FROM History where UserID='$UserID'";
		$result2=mysqli_query($connect,$query2);
		if ($result2) {
			echo "<script>window.location='ViewHistory.php';</script>";
		}
	}
	

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="ViewHistory.php" method="POST">
 	<?php 
 		if ($count>0) {
 			echo "<form action='ViewHistory' method='Post'>";
 			echo "<table border='1'>
 				<tr>
 					<th>Page Name</th>
 					<th>Access Time</th>
 					<th>Access Date</th>
 					<th>Action</th>
 				</tr>";
 			for ($i=0;  $i < $count ; $i++)  { 
 					$arr=mysqli_fetch_array($result);
 					echo "<tr>";
 						echo "<td align='center'>".$arr['PageName']."</td>";
 						echo "<td align='center'>".$arr['AccessTime']."</td>";
 						echo "<td align='center'>".$arr['AccessDate']."</td>";
 						echo "<td align='center'><a href='ViewHistory.php?HID=".$arr['HistoryID']."'>Clear</a></td>";
 						echo "</tr>";
 				}
 				
 				
 				echo "<tr>
 						<td colspan='4' align='center'><input type='submit'
 						name='btnClearAll' value='Clear all History'></td>
 					</tr>";
 				echo "</table>";
 				echo "</form>";
 				}
 				else {
 					echo  "<script>alert('No User History');</script>";
 					echo "<script>window.location='Home.php';</script>";

 				}				

 	 ?>
 	 </form>
 </body>
 </html>
 <?php include('Footer.php') ?>