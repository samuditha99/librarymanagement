<?php

$availability=$_GET['availability'];
if ($availability=='1') {
	header("Location: http://localhost/hnd7main/checkbook.php?availability=1");
}else{
	header("Location: http://localhost/hnd7main/checkbook.php?availability=0");
}



?>