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

$action=$_POST['action'];

if ($action=='search') {

$id=$_POST['id'];
$sql = "SELECT * FROM book_details WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name=$row['name'];
        $category=$row['category'];
        $author=$row['author'];
        $year=$row['year'];
        $medium=$row['medium'];
        $price=$row['price'];
        header("Location: http://localhost/hnd7main/librarian.php?action=search&name=$name&category=$category&author=$author&year=$year&medium=$medium&price=$price");
    }
}  


} elseif($action=='update') {
   



}elseif($action=='delete'){




}


$conn->close();
?>