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

$user_s=$_POST['user_l'];
$pass_s=$_POST['pass_l'];


//insert query
$sql = "SELECT * FROM user_details WHERE username='$user_s' AND password='$pass_s'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  header("Location: http://localhost/hnd7main/librarian.php"); 
	
	
} else {
	header("Location: http://localhost/hnd7main/login.php?password=incorrect");

}
$conn->close();

?>


