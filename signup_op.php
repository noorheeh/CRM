    <?php
    session_start();
    include 'config.php';

    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];	

    $conn = OpenCon();

    $query = 'SELECT * FROM user WHERE  email = "'.$email.'";';
    $result = mysqli_query($conn, $query) or die("Invalid query");
    $num = mysqli_num_rows($result);

    if($num > 0){
    	echo "This account already exist";
    }else  {
    	$new_pass =password_hash($password, PASSWORD_DEFAULT); 

    	$query2 = "INSERT INTO `user` (`name`, `password`,`email`) VALUES ('" . $name . "', '" . $new_pass . "','" . $email  . "');";
    	$result2 = mysqli_query($conn, $query2) or die("Invalid query");
    	echo true;

    }
    CloseCon($conn);
    ?>
    