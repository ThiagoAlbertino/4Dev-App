<?php
	session_start();

	if(!isset($_SESSION['username_funcionario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
    $link = $objDB->conecta_mysql();

	$id_funcionario = $_SESSION['id_funcionario'];


	$sql = "SELECT COUNT(id_avaliacao) AS id_avaliacao, 
                    COUNT(promotor) AS promotores, 
                    COUNT(neutro) AS neutros,
                    COUNT(detrator) AS detratores FROM avaliacao";

    $resultado_id = mysqli_query($link, $sql);

    $id_avaliacao = 0;
    $promotor = 0;
    $promotor_aux = 0;
    $neutro = 0;
    $neutro_aux = 0;
    $detrator = 0;
    $detrator_aux = 0;
    $resultado = 0;

    if($resultado_id){
    	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);	
    	$id_avaliacao = $registro['id_avaliacao'];
    	$promotor = $registro['promotores'];
    	$neutro = $registro['neutros'];
    	$detrator = $registro['detratores'];    	
	} else{
		echo 'Erro ao executar a query';
	}

	$promotor_aux = round(($promotor * 100 ) / $id_avaliacao);
	$neutro_aux = round(($neutro * 100 ) / $id_avaliacao);
	$detrator_aux = round(($detrator * 100 ) / $id_avaliacao);

	$resultado = round((($promotor - $detrator) / $id_avaliacao) * 100);


	if($resultado >= 80 && $resultado <= 100){
		$color = 'green';
	} elseif($resultado >= 60 && $resultado < 80){
		$color = 'yellow';
	} else{
		$color = 'red';
	}

?>	
<!DOCTYPE html>
<html lang="pt-br">
	<meta charset="utf-8">
	<head>
		<title>4Dev App</title>
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-static-top">
	      	<div class="container">
	        	<div class="navbar-header">
	          		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
	          		</button>
	          		<a href="index.php">
	          			<img src="images/4L.png" />
	        		</a>
	        	</div>
	        	<div id="navbar" class="navbar-collapse collapse">
	          		<ul class="nav navbar-nav navbar-right">
	            		<li><a href="#" value="Voltar" onclick="window.close()">Voltar</a></li>
	          		</ul>
	        	</div>
	      	</div>
	    </nav>
	    <div class="container">
	    	<div class="col-md-3">
	    		<h3>Resultado das Avaliações</h3>
	    		<p style="text-align: justify;">Como mostra a tabela, ocorreram <?= $id_avaliacao ?> avaliações. O número de promotores foi: <?= $promotor ?> (<?= $promotor_aux ?>% do total), de neutros foi: <?= $neutro ?> (<?= $neutro_aux ?>% do total) já o número de detratores foi: <?= $detrator ?> (<?= $resultado ?>% do total). Portanto, nossa situação é:<b style="color:  <?= $color ?>;"> <?= $color ?>.</b></p> 
	    		
	    	</div>
	      	<div class="col-md-9">
		        <table class="table">
					<thead class="thead-dark">
				    	<tr style="color: <?= $color?>">
					      	<th scope="col">Nº de Avaliações</th>
					      	<th scope="col">Nº de Promotores</th>
					      	<th scope="col">Nº de Neutros</th>
					      	<th scope="col">Nº de Detratores</th>
					      	<th scope="col">% de Promotores</th>
					      	<th scope="col">% de Neutros</th>
					      	<th scope="col">% de Detratores</th>
					      	<th scope="col">Resultado</th>
				    	</tr>
				  	</thead>
				  	<tbody id="lista">
					    <tr style="color: <?= $color?>">
					    	<td><?= $id_avaliacao ?></td>
		                    <td><?= $promotor ?></td>
		                    <td><?= $neutro ?></td>
		                    <td><?= $detrator ?></td>
		                    <td><?= $promotor_aux ?>%</td>
		                	<td><?= $neutro_aux ?>%</td>
		                    <td><?= $detrator_aux ?>%</td>
		                    <td><?= $resultado ?>%</td>
		                </tr>
				  	</tbody>
				</table>			
		    </div>  	
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>