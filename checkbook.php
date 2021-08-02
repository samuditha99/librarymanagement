<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<link rel="stylesheet" type="text/css" href="stylelib.css">
</head>
<body>
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
  <center>
   <h1 style="color: green">Lowa State University</h1>
   <h3 style="color: red">Welcome</h3>
   <a href="http://localhost/hnd7main/login.php">Logout
   </a>
 </center>

 <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'search')" id="defaultOpen">Search Books</button>
 </div>



<div id="search" class="tabcontent">
  <h3>Search Book Here</h3>
  <form method="GET" action="search_availability.php">
    Select Your Book :
    <select name="availability">
    <?php
    //Select query from userdetails table   
    $sql = "SELECT * FROM book_details";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { 
      echo '<option value='.$row['availability'].'>'.$row['name'].'</option>';
     }
    }
    ?>
    </select>
    <input type="submit" name="search" value="Search Availability">
  </form>
      <!-- Create Message for Availability -->
    <?php
    if (isset($_GET['availability'])) {
      if ($_GET['availability']=='1') {
       echo "<h3 style=color:green> Available </h3>";
      }else{
        echo "<h3 style=color:red> Not Available </h3>";
      }
    }
    ?>
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