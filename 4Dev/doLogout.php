<?php  
	session_start();
   
	unset ($_SESSION['username_cliente']);
   	unset ($_SESSION['id_cliente']);
   
   	unset ($_SESSION['username_funcionario']);
   	unset ($_SESSION['id_funcionario']);
   
   	header("location: index.php"); 
?>