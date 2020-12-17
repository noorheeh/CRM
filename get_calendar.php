<?php 
session_start();
include 'config.php';

$id = $_POST["id"];
$title = $_POST["title"]; 
$start = $_POST["start"]; 
$end = $_POST["end"]; 
$backgroundColor = $_POST["backgroundColor"]; 
$borderColor = $_POST["borderColor"]; 
$userId = $_SESSION["userid"];

$conn = OpenCon();

$query = 'SELECT * FROM event WHERE user_id = "'.$userId.'" && id = "'.$id.'";';
$result = mysqli_query($conn, $query) or die("Invalid query1");
$num = mysqli_num_rows($result);

if($num > 0){
	$data = mysqli_fetch_array($result);
	
		$update = 'UPDATE `event` SET `start`="'.$start.'",`end`="'.$end.'" WHERE id = "'.$id.'";';
		$result = mysqli_query($conn, $update) or die(mysql_error());

		echo "updated";
	
}else  {

		$query2 = 'INSERT INTO `event` ( `user_id`, `title`, `start`, `end`, `backgroundColor`, `borderColor`) VALUES ("'.$userId.'","'.$title.'", "'.$start.'", "'.$end.'","'.$backgroundColor.'", "'.$borderColor.'")';
		$result2 = mysqli_query($conn, $query2) or die("Invalid query");
	
	echo "done";
}

CloseCon($conn);
?>