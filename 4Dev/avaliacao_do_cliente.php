<?php
	session_start();

	if(!isset($_SESSION['username_cliente'])){
		header('Location: login_cliente.php?erro=2');
	}

	require_once('db.class.php');

	$objDB = new db();
    $link = $objDB->conecta_mysql();

	$id_cliente = $_SESSION['id_cliente'];
	$empresa_cliente = $_SESSION['empresa_cliente'];

	$sql = "SELECT data_tornou_cliente AS data_tornou_cliente FROM cliente_acesso WHERE id_cliente = $id_cliente";

    $resultado_id = mysqli_query($link, $sql);

    $data_tornou_cliente = 0;

    if($resultado_id){
    	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);	
    	$data_tornou_cliente = $registro['data_tornou_cliente'];
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
			            <li class="<?= $erro == 1 ? 'open' : ''?>">
			            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Minha Conta</a>
							<ul class="dropdown-menu" aria-labelledby="entrar">	
								<div class="col-md-12">
						    		<li><a href="area_do_cliente.php">Perfil</a></li>
						    		<li><a href="doLogout.php">Sair</a></li>
								</div>
						  	</ul>
			            </li>
		          	</ul>
	        	</div>
	      	</div>
	    </nav>
		<div class="container">
	      	<div class="col-md-4"></div>
	      	<div class="col-md-4">
		        <form method="post" action="salvar_avaliacao.php">
		        	<h3>Cadastro do cliente</h3>
		        	<label>Razão social</label>
					<div class="form-group">
						<input type="text" class="form-control" name="razao" placeholder="Razão social ou nome fantasia" required value="<?= $_SESSION['empresa_cliente'] ?>" />
					</div>
					<label>Nome do contato</label>
					<div class="form-group">
						<input type="text" class="form-control" name="responsavel" placeholder="Pessoa responsável pela avaliação" required/>
					</div>
					<label>Data em que se tornou cliente</label>
					<div class="form-group">
						<div class='input-group date'>
							<input type="date" class="form-control" name="data_tornou_cliente" placeholder="Usuário" required value="<?= $data_tornou_cliente ?>"/>
							<span class="input-group-addon">
					            <span class="glyphicon glyphicon-calendar"></span>
					        </span>
					    </div>    
					</div>								
					<br>
					<hr size="10" width="100%" align="center" >
	      			<br>
		        	<h3>Avaliação do sistema</h3>
		        	<label>Em uma escala de 0 a 10, qual a probabilidade de você recomendar nosso produto/serviço a um amigo/conhecido?</label>
					<div class="form-group">
						<input type="number" class="form-control" min="0" max="10" id="campo_usuario" name="nota_sistema" required/>
					</div>
					<label>Qual o motivo dessa nota?</label>
					<div class="form-group">
						<textarea class="form-control" rows="5" id="comment" name="motivo_nota" required></textarea>
					</div>
					<button type="buttom" class="btn btn-primary" id="btn">Submeter Avaliação</button>
					<br><br>
				</form>
	      	</div>
	      	<div class="col-md-4"></div>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>