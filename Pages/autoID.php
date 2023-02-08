<?php 
	function AutoID($tableName,$fieldName,$prefix,$noofLeadingZeros)
	{
		$connect=mysqli_connect("localhost","root","","airpollutiondb");
		$value=1;
		$sql="SELECT".$fieldName."FROM".$tableName."ORDER BY".$fieldName."DESC";
		$result=mysqli_query($connect,$sql);
		$noofRow=mysqli_num_rows($result);
		$row=mysqli_fetch_array($reuslt);
		if ($noofRow<1) {
			return $prefix . "000001";
		}
		else{
			$oldID=$row[$fieldName];
			$oldID=str_replace($prefix,"",$oldID);
			$value=(int)$oldID;
			$value++;
			$newID=$prefix . NumberFormatter($value,$noofLeadingZeros);
			return $newID;
		}
	}
	function NumberFormatter($number,$n)
	{
		return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
	}
 ?>