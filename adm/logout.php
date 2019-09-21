<?php
	
	session_start();
	$_SESSION['usuario'] = null;
	$_SESSION['senha'] = null;
	session_destroy();
	header( "Location: index.php" );

?>
