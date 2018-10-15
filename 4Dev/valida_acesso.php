<?php
	session_start();

	require_once('db.class.php');

	$username = $_POST['username'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT id, nome, username, funcao FROM funcionario WHERE username = '$username' AND senha = '$senha'";

	$objDB = new db();
	$link = $objDB -> conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['username'])){
		 	$_SESSION['id_funcionario'] = $dados_usuario['id'];
		 	$_SESSION['username_funcionario'] = $dados_usuario['username'];
		 	$_SESSION['nome_funcionario'] = $dados_usuario['nome'];
		 	$_SESSION['funcao_funcionario'] = $dados_usuario['funcao'];
			header('Location: area_do_funcionario.php');
		} else{
			header('Location: index.php?erro=1');
		}
	} else{
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}
?>