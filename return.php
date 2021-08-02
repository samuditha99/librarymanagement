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
$return_on=$_POST['return_on'];

$sql = "SELECT * FROM issue_return_details WHERE bookname='$bookname' AND userNIC='$userNIC'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id=$row['id'];
        $to=$row['issued_to'];
        $ts1 = strtotime($return_on);
        $ts2 = strtotime($to);
        $seconds_diff = $ts1 - $ts2; // output will come with seconds 
        // we need to count in days to collect fine
        // there are 86400 seconds for a one day
        $dayscount= round($seconds_diff/86000); // round to nearest decimal place
        if($dayscount>0){
        $fine=$dayscount*2; // Rs 2/= per day
        }else{
            $fine=0;
        }
    }
}

$sqlupdate = "UPDATE issue_return_details SET IsReturn='YES',fine='$fine',return_on='$return_on' WHERE id=$id";
$sqlupdate2 = "UPDATE book_details SET availability ='1' WHERE name='$bookname'";
$result = $conn->query($sqlupdate);
$result1 = $conn->query($sqlupdate2);
header("Location: http://localhost/hnd7main/librarian.php?return=yes&fine='$fine'");
conn->close();
?>