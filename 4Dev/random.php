<?php  
	session_start();

	if(!$_SESSION['username_funcionario']){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB -> conecta_mysql();

	$sql = "SELECT COUNT(id_cliente) AS max_cliente FROM cliente_acesso";

    $resultado_id = mysqli_query($link, $sql);

    $max_cliente = 0;

    if($resultado_id){
    	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);	
    	$max_cliente = $registro['max_cliente'];
	} else{
		echo 'Erro ao executar a query';
	}

	$porcentagem = (20 * $max_cliente) / 100;
	$auxiliar = round($porcentagem);
	$arr =  array($auxiliar);
	$numero = 0;

	for($i = 0; $i < $auxiliar; $i++){
		$numero = rand(1,$max_cliente);
		$arr[$i] = $numero;
	}


	$copia = array_unique($arr);
	if(count($copia) != count($arr)) {
	    echo "existem valores duplicados";
	    for($i = 0; $i < $auxiliar; $i++){
			$numero = rand(1,$max_cliente);
			$arr[$i] = $numero;
		}
	} else {
	    echo "não existem valores duplicados";
	}

	for($i = 0; $i < $auxiliar; $i++){

		$sql = "UPDATE cliente_acesso SET precisa_avaliar = 'Sim' WHERE id_cliente = $arr[$i];";

	    $resultado_id = mysqli_query($link, $sql);

	    if($resultado_id){
	    	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);	
	    	header('Location: area_do_funcionario.php');
		} else{
			echo 'Erro ao executar a query';
		}
	}			   
?>   