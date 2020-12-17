
<?php
session_start();
include 'config.php';

$email = $_POST["email"];
$password = $_POST["password"];

$conn = OpenCon();

$query = "SELECT * FROM user WHERE email = '" . $email . "';";
$result = mysqli_query($conn, $query) or die("Invalid query");
$num = mysqli_num_rows($result);
if($num > 0){
	$data = mysqli_fetch_array($result);
	if(password_verify($password, $data['password'])){
		if(!empty($_POST["remember"]))
			if ($_POST["remember"] == 1) {
				setcookie("email", $email, time() +(60*60*24*365),"/",null,null,TRUE);
				setcookie("password", $password, time() +(60*60*24*365),"/",null,null,TRUE);
			}
			
			$_SESSION["user"] = $data['name'];
			$_SESSION["userid"] = $data['id'];
			echo true;
			
		}else{
			echo "Email or Password Invalid";
		}

	}else{
		$query = "SELECT * FROM admin WHERE email = '" . $email . "';";
		$result = mysqli_query($conn, $query) or die("Invalid query");
		$num = mysqli_num_rows($result);
		if($num > 0){
			$data = mysqli_fetch_array($result);
			if(password_verify($password, $data['password'])){
				if(!empty($_POST["remember"]))
					if ($_POST["remember"] == 1) {
						setcookie("email", $email, time() +(60*60*24),"/",null,null,TRUE);
						setcookie("password", $password, time() +(60*60*24),"/",null,null,TRUE);
					}
					$_SESSION["admin"] = $data['name'];
					$_SESSION["userid"] = $data['id'];
					echo true;

				}else{
					echo "Email or Password Invalid";
				}
			}else{
				echo "Email or Password Invalid";
			}

		}
		CloseCon($conn);
		?>

