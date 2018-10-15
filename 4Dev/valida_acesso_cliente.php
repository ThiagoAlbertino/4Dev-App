<?php
	session_start();

	require_once('db.class.php');

	$username = $_POST['username'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT id_cliente, empresa_cliente, username_cliente FROM cliente_acesso WHERE username_cliente = '$username' AND senha_cliente = '$senha'";

	$objDB = new db();
	$link = $objDB -> conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['username_cliente'])){
		 	$_SESSION['id_cliente'] = $dados_usuario['id_cliente'];
		 	$_SESSION['username_cliente'] = $dados_usuario['username_cliente'];
		 	$_SESSION['empresa_cliente'] = $dados_usuario['empresa_cliente'];
			header('Location: area_do_cliente.php');
		} else{
			header('Location: login_cliente.php?erro=2');
		}
	} else{
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}

	$id_cliente = $_SESSION['id_cliente'];

	$sql = "SELECT precisa_avaliar AS avaliacao FROM cliente_acesso WHERE id_cliente = '$id_cliente'";

    $resultado = mysqli_query($link, $sql);

    $avaliacao = 0;

    if($resultado){
    	$registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);	
    	$avaliacao = $registro['avaliacao'];
	} else{
		echo 'Erro ao executar a query';
	}

	if($avaliacao == 'Sim'){
		header('Location: area_do_cliente.php?erro=1');
	} 
?>