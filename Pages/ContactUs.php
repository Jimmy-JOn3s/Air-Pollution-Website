<?php 
include('Header.php');
  $connect=mysqli_connect("localhost","root","","airpollutiondb");
  if (isset($_SESSION['UserID'])) {
  $UID=$_SESSION['UserID'];
  $query="SELECT * FROM User 
          Where UserID='$UID'";
  $result=mysqli_query($connect,$query);
  $arr=mysqli_fetch_array($result);
  }
  else{
  	echo "<script>alert('Please User Login First.')</script>";
  	echo "<script>window.location='UserLogin.php';</script>";
  } 
  if (isset($_POST['btnContactUs'])) {
  	$UserID=$_POST['txtUserID'];
  	$Question=$_POST['txtQuestion'];
  	$QuestionDate=date('Y-m-d');
  	date_default_timezone_set('Asia/Rangoon');
  	$QuestionTime=date('h:i:sa');
  	$insert="INSERT INTO ContactUs(Question,Answer,UserID,QuestionDate,QuestionTime) 
  	         VALUES('$Question','Null','$UserID','$QuestionDate','$QuestionTime')";
  	$ret=mysqli_query($connect,$insert);
  	if ($ret) {
  		echo "<script>alert('Question ask Successful.')</script>";
  	}
  	else{
  		echo mysqli_error($connect);
  	}
  }
  if (isset($_SESSION['UserID'])) {
  $UserID=$_SESSION['UserID'];
  $PgName="ContactUs.php";
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
	<title></title>
</head>
<body>
	<form action="ContactUs.php" method="POST">
	<input type="hidden" name="txtUserID" value="<?php echo $arr['UserID']?>">
	<table>
		<tr>
			<td  width="50%" align="right">Question</td>
			<td><input type="text" name="txtQuestion" required></td>
		</tr>
		<tr>
			<td align="right">Full Name</td>
			<td ><input type="text" name="txtFullName" value="<?php echo $arr['FullName'] ?>" readonly></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnContactUs" value="Ask"></td>
		</tr>
	</table>
	</form>
</body>
</html>
 <?php include('Footer.php'); ?>