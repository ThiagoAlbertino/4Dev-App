<?php
	session_start();

	if(!isset($_SESSION['username_funcionario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
    $link = $objDB->conecta_mysql();

	$id_funcionario = $_SESSION['id_funcionario'];
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
						<li><a href="#" value="Voltar" onClick="history.go(-1)">Voltar</a></li>
						<li><a href="doLogout.php">Sair</a></li>
		          	</ul>
	        	</div>
	      	</div>
	    </nav>
		<div class="container">
	      	<div class="col-md-4"></div>
	      	<div class="col-md-4">
		        <form method="post" action="salvar_cliente.php" id="formSalvar">
		        	<h3>Adicionar Cliente</h3>
		        	<label>Username</label>
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username que o cliente usará para o login" required/>
					</div>
					<label>Senha</label>
					<div class="form-group">
						<input type="password" class="form-control" name="senha" placeholder="Senha que o cliente usará para o login" required/>
					</div>
					<label>Empresa do cliente</label>
					<div class="form-group">
						<input type="text" class="form-control" name="empresa" placeholder="Nome da empresa do cliente, ex: Twitter, Inc." required/>
					</div>
					<label>Data em que se tornou cliente</label>
					<div class="form-group">
						<div class='input-group date'>
							<input type="date" class="form-control" name="data_tornou_cliente" required/>
							<span class="input-group-addon">
					            <span class="glyphicon glyphicon-calendar"></span>
					        </span>
					    </div>    
					</div>								
					
					<br>
					<button type="buttom" class="btn btn-primary" id="btn">Adicionar Cliente</button>
				</form>
			</div>
	      	<div class="col-md-4"></div>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>