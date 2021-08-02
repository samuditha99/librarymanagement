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

//Get Variables From the form

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$nic=$_POST['nic'];
$tel=$_POST['tel'];
$username_p=$_POST['username_p'];
$password_p=$_POST['password_p'];
$passwordconfirm_p=$_POST['passwordconfirm_p'];
$usertype="professor";
if($password_p==$passwordconfirm_p){
//insert query
	$sql = "INSERT INTO user_details (fname, lname, gender, nic,tel,username,password,usertype)
	VALUES ('$fname', '$lname', '$gender' , '$nic','$tel', '$username_p' , '$password_p','$usertype')";

	if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
		header("Location: http://localhost/hnd7main/login.php?create=professor");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}else{
		header("Location: http://localhost/hnd7main/new_professor.php?password=incorrect");

	}
	$conn->close();
	?>