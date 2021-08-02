  <?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hn7main";

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 } 

 $user_p=$_POST['user_p'];
 $pass_p=$_POST['pass_p'];


//Select query from userdetails table   
 $sql = "SELECT * FROM user_details WHERE username='$user_p' AND password='$pass_p'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
    // output data of each row
   while($row = $result->fetch_assoc()) { 
    $name=$row["fname"]." ".$row["lname"];
  }

header("Location: http://localhost/hnd7main/checkbook.php");

} else {
  header("Location: http://localhost/hnd7main/login.php?password=incorrect");
}
$conn->close();

?>
