<?php
	session_start();

	if(!isset($_SESSION['username_funcionario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
    $link = $objDB->conecta_mysql();

	$id_funcionario = $_SESSION['id_funcionario'];

    $string = $_POST['campo'];

    $objDB = new db();
    $link = $objDB->conecta_mysql();
    
    $sql = "SELECT id_avaliacao, id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao FROM avaliacao WHERE razao_social = '$string' OR pessoa_responsavel = '$string' OR sinalizador = '$string' ORDER BY data_avaliacao DESC";

    $resultado_id = mysqli_query($link, $sql);    
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
	            		<li><a href="#" value="Voltar" onClick="history.go(-1)">Voltar</a></li>
	          		</ul>
	        	</div>
	      	</div>
	    </nav>
	    <div class="container">
	    	<div class="col-md-2"></div>
	      	<div class="col-md-8">
		        <table class="table">
					<thead class="thead-dark">
				    	<tr>
					      	<th scope="col">ID Avaliação</th>
					      	<th scope="col">Razão social</th>
					      	<th scope="col">Pessoa responsável</th>
					      	<th scope="col">Sinalizador</th>
					      	<th scope="col">Data em que se tornou cliente</th>
					      	<th scope="col">Realizou a avaliação</th>
					      	<th scope="col">Data da avaliação</th>
					      	<th scope="col">Nota da avaliação</th>
				    	</tr>
				  	</thead>
				  	<tbody id="lista">
					    <?php 
					    	if($resultado_id){
						        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
						            echo '
						                <tr>
						                    <th>'.$registro['id_avaliacao'].'</th>
						                    <td>'.$registro['razao_social'].'</td>
						                    <td>'.$registro['pessoa_responsavel'].'</td>
						                    <td>'.$registro['sinalizador'].'</td>
						                    <td>'.$registro['data_tornou_cliente'].'</td>
						                    <td>'.$registro['realizou_avaliacao'].'</td>
						                    <td>'.$registro['data_avaliacao'].'</td>
						                    <td>'.$registro['nota_avaliacao'].'</td>
						                </tr>
						            ';  
						        }
						    }else{
						        echo 'Erro na consulta de tweets no banco de dados!';
						    }
					    ?>
				  	</tbody>
				</table>			
		    </div>  
		    <div class="col-md-2"></div>	
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>