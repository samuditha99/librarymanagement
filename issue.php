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
$bookname=$_POST['bookname'];
$userNIC=$_POST['userNIC'];
$issuedfrom=$_POST['issuedfrom'];
$issuedto=$_POST['issuedto'];
$IsReturn="NO";
$fine=0;
//insert query
$sql = "INSERT INTO issue_return_details (bookname, userNIC, issued_from, issued_to,return_on,IsReturn,fine) VALUES ('$bookname', '$userNIC', '$issuedfrom' , '$issuedto','','$IsReturn','$fine')";
$sql2 = "UPDATE book_details SET availability='0' WHERE name='$bookname'";
if ($conn->query($sql2) === TRUE) {
if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/hnd7main/librarian.php?issued=yes");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>