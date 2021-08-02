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



$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$nic=$_POST['nic'];
$tel=$_POST['tel'];
$username_s=$_POST['username_s'];
$password_s=$_POST['password_s'];
$passwordconfirm_s=$_POST['passwordconfirm_s'];
$usertype="student";
if($password_s==$passwordconfirm_s){
//insert query
	$sql = "INSERT INTO user_details (fname, lname, gender, nic,tel,username,password,usertype)
	VALUES ('$fname', '$lname', '$gender' , '$nic','$tel', '$username_s' , '$password_s','$usertype')";

	if ($conn->query($sql) === TRUE) {
    	//echo "New record created successfully";
		header("Location: http://localhost/hnd7main/login.php?create=student");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}else{
	header("Location: http://localhost/hnd7main/new_student.php?password=incorrect");

}
$conn->close();
?>


