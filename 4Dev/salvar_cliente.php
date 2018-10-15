<?php
	session_start();

	if(!$_SESSION['username_funcionario']){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

    $id_funcionario = $_SESSION['id_funcionario'];
    
    $username = $_POST['username']; 
    $senha = md5($_POST['senha']);
    $empresa = $_POST['empresa'];
    $data_tornou_cliente = $_POST['data_tornou_cliente'];

	$objDB = new db();
	$link = $objDB -> conecta_mysql();
	
	$sql = "INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) VALUES('$username', '$senha', '$empresa', '$data_tornou_cliente')";
	
	if(mysqli_query($link, $sql)){
		header('Location: area_do_funcionario.php');
	} else{
		header('Location: index.php');
	}
?>