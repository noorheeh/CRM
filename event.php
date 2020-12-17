<?php 
include 'config.php';

$conn = OpenCon();
$userId = $_SESSION["userid"];
$dbdata = array();

$query = 'SELECT * FROM event WHERE user_id = "'.$userId.'";';
$result = mysqli_query($conn, $query) or die("Invalid query1");
$num = mysqli_num_rows($result);

if($num > 0){
	while($row = mysqli_fetch_assoc($result)) {
		$dbdata[]=$row;
	}
	echo json_encode($dbdata);

}else  {

echo "'nothing'";
}


CloseCon($conn);

?>