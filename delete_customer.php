<?php
session_start();
include("config.php");
$phone=$_POST["phone"];
$userId = $_SESSION["userid"];
$conn = OpenCon();
$query="DELETE FROM `customer` WHERE user_id ='".$userId."' AND phone='".$phone."';";
if(mysqli_query($conn, $query)){
	echo "Done";
}
else{
	echo "Can't delete. Try again!";
}
    CloseCon($conn);
?>