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

$name=$_POST['name'];
$category=$_POST['category'];
$year=$_POST['year'];
$medium=$_POST['medium'];
$price=$_POST['price'];
$author=$_POST['author'];
$availability='1'; // when we insert a book we can take avilability as 1

//insert query
$sql = "INSERT INTO book_details (name, category,author, year, medium,price,availability)
VALUES ('$name', '$category','$author', '$year' , '$medium','$price','$availability')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header("Location: http://localhost/hnd7main/librarian.php?create=book");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>