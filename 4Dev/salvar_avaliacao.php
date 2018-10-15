<?php
	session_start();

	if(!$_SESSION['username_cliente']){
		header('Location: login_cliente.php?erro=2');
	}

	require_once('db.class.php');

	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d');

	$sinalizador = $_POST['nota_sistema'];
	$sinalizador2 = '';

	$id_cliente = $_SESSION['id_cliente'];
    $razao_social = $_POST['razao']; 
    $responsavel = $_POST['responsavel'];
    $data_tornou_cliente = $_POST['data_tornou_cliente'];
    $nota_sistema = $_POST['nota_sistema'];
    $motivo_nota = $_POST['motivo_nota'];

    $objDB = new db();
	$link = $objDB -> conecta_mysql();

	if($sinalizador == 9 || $sinalizador == 10){
		$sinalizador2 = "Promotor";

		$sql = "INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) VALUES('$id_cliente', '$razao_social', '$responsavel', '$sinalizador2', '$data_tornou_cliente', 'Sim', '$date', '$nota_sistema', '$motivo_nota', 'Sim')";
	
		if(mysqli_query($link, $sql)){
			header('Location: area_do_cliente.php');
		} else{
			header('Location: index.php');
		}

	} else if($sinalizador == 7 || $sinalizador == 8) {
		$sinalizador2 = "Neutro";

		$sql = "INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, neutro) VALUES('$id_cliente', '$razao_social', '$responsavel', '$sinalizador2', '$data_tornou_cliente', 'Sim', '$date', '$nota_sistema', '$motivo_nota', 'Sim')";
	
		if(mysqli_query($link, $sql)){
			header('Location: area_do_cliente.php');
		} else{
			header('Location: index.php');
		}

	} else if($sinalizador == 0 || $sinalizador == 1 || $sinalizador == 2 || $sinalizador == 3 || $sinalizador == 4 || $sinalizador == 5 || $sinalizador == 6) {
		$sinalizador2 = "Detrator";

		$sql = "INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, detrator) VALUES('$id_cliente', '$razao_social', '$responsavel', '$sinalizador2', '$data_tornou_cliente', 'Sim', '$date', '$nota_sistema', '$motivo_nota', 'Sim')";
	
		if(mysqli_query($link, $sql)){
			header('Location: area_do_cliente.php');
		} else{
			header('Location: index.php');
		}
	}	
?>