<?php
include("config.php");
$phone=$_POST["phone"];
$conn = OpenCon();
$query="DELETE FROM `customer` WHERE `customer`.`phone`=".$phone.";";
if(mysqli_query($conn, $query)){
	echo "Done";
}
else{
	echo "cant delete";
}
    CloseCon($conn);
?>