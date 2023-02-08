<?php 
include('Header2.php');

 if (isset($_POST['btnAnswer'])) {
 	$CID=$_POST['txtContactUsID'];
 	$Answer=$_POST['txtAnswer'];
 	 $update="UPDATE ContactUs SET
 	         Answer='$Answer'
 	         Where ContactID='$CID'";
 	$ret=mysqli_query($connect,$update);
 	if ($ret) {
 		echo "<script>alert('Answer Successful.')</script>";
 	}
 	else{
 		echo mysqli_error($connection);
 	}
 }
if (!isset($_REQUEST['QID'])) {
	echo "<script>window.location='ViewQuestion.php';</script>";
}
else{
	$ContactID=$_REQUEST['QID'];
	$query="SELECT * FROM ContactUS 
	        WHERE ContactID='$ContactID'";
	$result=mysqli_query($connect,$query);
 	$arr=mysqli_fetch_array($result);
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="Answer.php" method="POST">
 		<input type="hidden" name="txtContactUsID" value="<?php echo $arr['ContactID']?>">
 		<table>
		<tr>
			<td>Question</td>
			<td><?php echo $arr['Question']?></td>
		</tr>
		<tr>
			<td>Answer</td>
			<td><textarea name="txtAnswer" required></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnAnswer" value="Answer"></td>
		</tr>
	</table>
 	</form>
 </body>
 </html>
 <?php include('Footer.php') ?>