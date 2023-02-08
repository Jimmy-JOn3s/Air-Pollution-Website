<?php 
include('Header.php');
$query="SELECT * FROM contactus";
$result=mysqli_query($connect,$query);
$count=mysqli_num_rows($result);
 if (isset($_SESSION['UserID'])) {
 	$UserID=$_SESSION['UserID'];
 	$PgName="FAQ.php";
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
 		<?php 
 			 for ($i=0; $i < $count ; $i++) { 
 				$arr=mysqli_fetch_array($result);
 				$no=$i+1;
 				echo "Question (".$no.") : ";
 				echo $arr['Question'];
 				echo "<br>";
 				echo "Answer (".$no.") :";
 				echo $arr['Answer'];
 				echo "<br>";
 			 }
 		 ?>	
 		 <a href="ContactUs.php"><input type="button" value="ContactUs"></a>							
 </body>
 </html>
 <?php include('Footer.php'); ?>