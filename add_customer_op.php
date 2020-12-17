    <?php
    session_start();
    include 'config.php';

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $service = $_POST["service"];
    $problem = $_POST["problem"]; 
    $userId = $_SESSION["userid"];

    $conn = OpenCon();

    $query = 'SELECT * FROM customer WHERE  phone = "'.$phone.'";';
    $result = mysqli_query($conn, $query) or die("Invalid query");
    $num = mysqli_num_rows($result);

    if($num > 0){
      echo "This customer already exist";
    }else  {

      $query2 = "INSERT INTO `customer` (`user_id`,`name`, `phone`,`service`,`problem`) VALUES ('".$userId."', '".$name ."', '" . $phone . "','" . $service  . "','" . $problem  . "');";
      $result2 = mysqli_query($conn, $query2) or die("Invalid query");
      echo true;

    }
    CloseCon($conn);
    ?>
    