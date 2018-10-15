<?php
	session_start();

	if(!isset($_SESSION['username_funcionario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
    $link = $objDB->conecta_mysql();

	$id_funcionario = $_SESSION['id_funcionario'];
	$nome_funcionario = $_SESSION['nome_funcionario'];
	$funcao_funcionario = $_SESSION['funcao_funcionario'];

	$sql = "SELECT date_format(data_admissao, '%d %b %Y') AS data FROM funcionario WHERE id = $id_funcionario";

    $resultado_id = mysqli_query($link, $sql);

    $data = 0;

    if($resultado_id){
    	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);	
    	$data = $registro['data'];
	} else{
		echo 'Erro ao executar a query';
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
		            	<li><a href="Sobre.php">Sobre</a></li>
		            	<li><a href="doLogout.php">Sair</a></li>
		          	</ul>
	        	</div>
	      	</div>
	    </nav>
	    <div class="container">
	      	<div class="col-md-4"></div>
	      	<div class="col-md-4">
				<div class="profile-sidebar">
					<div class="profile-usertitle" style="text-align: center;">
						<div class="profile-usertitle-name">
							<h3><?=$_SESSION['nome_funcionario']?></h3>
						</div>
						<div class="profile-usertitle-name">
							<label>Username: </label> <?= $_SESSION['username_funcionario']?>
						</div>
						<div class="profile-usertitle-job">
							<label>Função: </label> <?= $_SESSION['funcao_funcionario']?>
						</div>
						<div class="profile-usertitle-job">
							<label>Funcionário desde: </label> <?= $data ?>
						</div>
					</div>
					<div class="profile-usermenu" style="text-align: center;">
						<ul class="nav">
							<li>
								<a href="lista_de_clientes.php" target="_blank">
								<i></i>
									Avaliações 
								</a>
							</li>
							<li>
								<a href="adicionar_cliente.php">
								<i class="glyphicon glyphicon-user"></i>
									Adicionar clientes 
								</a>
							</li>
							<li>
								<a href="listar_clientes.php" target="_blank">
								<i class="glyphicon glyphicon-user"></i>
									Clientes 
								</a>
							</li>	
							<li>
								<a href="meta.php" target="_blank">
								<i></i>
									Resultado das Avaliações 
								</a>
							</li>
							<li>
								<a href="random.php">
								<i></i>
									Gerar 20% de clientes mensais 
								</a>
							</li>	
						</ul>
					</div>	
				</div>
				<br>	
		    </div>  	
	      	<div class="col-md-4"></div>		
		</div>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>