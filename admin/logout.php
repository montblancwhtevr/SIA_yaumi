<?php
	session_start();
?>
<!doctype html>
<head>
<?php

	if(!isset($_SESSION['id_login'])){
		echo "<meta http-equiv='Refresh' content='0; ../index.php'>";
	}
	else{
		echo "<meta http-equiv='Refresh' content='0; ../index.php'>";
	}
	
	
		
	?>
</head>
<?php
	
	session_destroy();
?>