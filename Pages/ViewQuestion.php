<?php 
include('Header2.php');
 if (isset($_SESSION['StaffID'])) {
 	$SID=$_SESSION['StaffID'];
 	$query="SELECT * FROM staff 
 	        Where StaffID='$SID'";
 	$result=mysqli_query($connect,$query);
 	$arr=mysqli_fetch_array($result);

 }
 else{
 	echo "<script>alert('Please Login First.')</script>";
  	echo "<script>window.location='StaffLogin.php';</script>";
 }
 if (isset($_SESSION['UserID'])) {
 	$UserID=$_SESSION['UserID'];
 	$PgName="ViewQuestion.php";
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
	<table border="1">
	<tr>
		<th>Question</th>
		<th>Answer</th>
		<th>Full Name</th>
		<th>Question Date</th>
		<th>Question Time</th>
		<th>Action</th>
	</tr>
	<?php 
     $select="SELECT u.*,q.* FROM ContactUs q, User u
              WHERE u.UserID=q.UserID";
     $result=mysqli_query($connect,$select);
     if ($result){
     $count=mysqli_num_rows($result);
     for($i=0; $i <$count ; $i++){
	 $arr=mysqli_fetch_array($result);
	 echo "<tr>";
	 echo "<td align='center'>".$arr['Question']."</td>";
	 echo "<td align='center'>".$arr['Answer']."</td>";
	 echo "<td align='center'>".$arr['FullName']."</td>";
	 echo "<td align='center'>".$arr['QuestionDate']."</td>";
	 echo "<td align='center'>".$arr['QuestionTime']."</td>";
	 echo "<td align='center'><a href='Answer.php?QID=".$arr['ContactID']."'>Answer</a></td>";
	 echo "</tr>";
}
}
else{
echo mysqli_error();
}
?>
</table>
</body>
</html>
<?php include('Footer.php') ?>