<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="stylelib.css">
</head>
<body>

<h2>Librarian</h2>
<p>LMS - Lowa State University 

<?php
    if (isset($_GET['create'])) {
      if ($_GET['create']=='book') {
        ?>

        <b style="color: green">* Book Create Successfully *</b></p>
        <?php
      }
    }
?>
<?php
    if (isset($_GET['issued'])) {
      if ($_GET['issued']=='yes') {
        ?>

        <b style="color: green">* Book Issued Successfully *</b></p>
        <?php
      }
    }
?>
<?php
    if (isset($_GET['return'])) {
      if ($_GET['return']=='yes') {
        ?>

        <b style="color: green">* Book Returned Successfully * Fine : Rs.<?php echo $_GET['fine']?>/= </b></p>
        <?php
      }
    }
?>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'add')" >Add Book Details</button>
  <button class="tablinks" onclick="openCity(event, 'sud')" id="defaultOpen">Search / Update / Delete</button>
  <button class="tablinks" onclick="openCity(event, 'issue')">Issue</button>
  <button class="tablinks" onclick="openCity(event, 'return')">Return</button>

</div>

<div id="add" class="tabcontent">
  <h3>You Can Add New Book Here</h3>
  <form method="POST" action="submitbooks.php">
  <table>
    <tr>
      <td>Book Name :</td>
      <td><input type="text" name="name"></td>
    </tr>
    <tr>
      <td>Category :</td>
      <td>
        <select name="category">
          <option value="Education" selected="selected"> Education</option>
          <option value="Entertainment"> Entertainment</option>
          <option value="Novels"> Novels</option>
          <option value="Crime"> Crime</option>
          <option value="Horror"> Horror</option>
          <option value="Documentation"> Documentation</option>
          <option value="Other"> Other</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Author :</td>
      <td><input type="text" name="author"></td>
    </tr>
    <tr>
      <td>Year :</td>
      <td><input type="text" name="year"></td>
    </tr>
    <tr>
      <td>Medium :</td>
      <td>
        <select name="medium">
          <option value="Sinhala" selected="selected"> Sinhala</option>
          <option value="Tamil"> Tamil</option>
          <option value="English"> English</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Price :</td>
      <td><input type="text" name="price"></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input class="button1" type="submit" name="action" value="Add Book">
        <input  class="button1 reset1" type="reset" value="Clear">
      </td>
    </tr>
  </table>
 </form>
 <a href="http://localhost/hnd7main/login.php">Back (Home)</a>
</div>

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


?>

<div id="sud" class="tabcontent">
  <h3>Search / Update / Delete</h3>
  <form method="POST" action="sud.php">
    Select Book :
    <select name='id'>
<?php
$sql = "SELECT * FROM book_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['id'].'>'.$row['name'].'</option>';
    }
}

?>
    </select>
    <input type="submit" name="action" value="search">
    <table>

<?php
if(isset($_GET['action'])){
  if($_GET['action']=='search'){
$name=$_GET['name'];
$category=$_GET['category'];
$author=$_GET['author'];
$year=$_GET['year'];
$medium=$_GET['medium'];
$price=$_GET['price'];
  }
}else{
  $name="";
$category="";
$author="";
$year="";
$medium="";
$price="";
}
?>
    <tr>
    <td>
    Book Name :
    </td>
    <td>
    <?php echo $name?>
    </td>
    </tr>
    <tr>
    
      <td>Category :</td>
      <td>
        
        <select name="category">
          <option value="<?php echo $category; ?>" selected="selected"> <?php echo $category; ?></option>
          <option value="Education"> Education</option>
          <option value="Entertainment"> Entertainment</option>
          <option value="Novels"> Novels</option>
          <option value="Crime"> Crime</option>
          <option value="Horror"> Horror</option>
          <option value="Documentation"> Documentation</option>
          <option value="Other"> Other</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Author :</td>
      <td><input type="text" name="author" value="<?php echo $name ?>"></td>
    </tr>
    <tr>
      <td>Year :</td>
      <td><input type="text" name="year" value="<?php echo $year ?>"></td>
    </tr>
    <tr>
      <td>Medium :</td>
      <td>
        <select name="medium">
        <option value="<?php echo $medium; ?>" selected="selected"> <?php echo $medium; ?></option>
          <option value="Sinhala"> Sinhala</option>
          <option value="Tamil"> Tamil</option>
          <option value="English"> English</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Price :</td>
      <td><input type="text" name="price" value="<?php echo $price ?>"></td>
    </tr>


    <tr>
      <td></td>
      <td>
        <input class="button1" type="submit" name="action" value="update">
        <input  class="button1 reset1" type="submit" name="action" value="delete">
      </td>
    </tr>
    </table>
  </form>
</div>

<div id="issue" class="tabcontent">
<form method="POST" action="issue.php">
  <h3>Issue Book Here</h3>
  <table>
  <tr>
  <td>Select Book : </td>
  <td>  
  <select name='bookname'>

<?php
$sql = "SELECT * FROM book_details WHERE availability='1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['name'].'>'.$row['name'].'</option>';
    }
}

?>
    </select>
  </td>
  </tr>
  <tr>
  <td>Select User : </td>
  <td>    
  <select name='userNIC'>
<?php
$sql = "SELECT * FROM user_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['nic'].'>'.$row['fname']." ".$row['lname'].'</option>';
    }
}

?>
    </select>
  </td>
  </tr> 
  <tr>
  <td>Issued From : </td>
  <td><input type="date" name="issuedfrom"></td>
  </tr>
  <tr>
  <td>Issued To : </td>
  <td><input type="date" name="issuedto"></td>
  </tr>
  <tr>
      <td></td>
      <td>
        <input class="button1" type="submit" name="action" value="Issue">
        <input  class="button1 reset1" type="reset" name="action" value="Reset">
      </td>
  </table>
  </form>
</div>

<div id="return" class="tabcontent">
  <h3>Return Book Here</h3>
  <h5 style="color:red"> Rs 2/= Per Late Day</h5>
  <form method="POST" action="return.php">
  
  <table>
 
  <tr>
  <td>Select User NIC : </td>
  <td>    
  <select name='userNIC'>
<?php
$sql = "SELECT * FROM issue_return_details WHERE IsReturn='NO'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['userNIC'].'>'.$row['userNIC'].'</option>';
    }
}

?>
    </select>
  </td>
  </tr> 
  <tr>
  <td>Select Book : </td>
  <td>  
  <select name='bookname'>
<?php
$sql = "SELECT * FROM issue_return_details WHERE IsReturn='NO'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['bookname'].">".$row['bookname'].'</option>';
    }
}

?>
    </select>
  </td>
  </tr>
  <tr>
  <td>Returned on : </td>
  <td><input type="date" name="return_on"></td>
  </tr>
  <tr>
      <td></td>
      <td>
        <input class="button1" type="submit" name="action" value="return">
        <input  class="button1 reset1" type="reset" name="action" value="Reset">
      </td>
  </table>
  </form>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
