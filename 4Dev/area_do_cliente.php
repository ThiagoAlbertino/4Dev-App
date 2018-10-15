<?php
	session_start();

	if(!isset($_SESSION['username_cliente'])){
		header('Location: login_cliente.php?erro=2');
	}

	$erro = isset($_GET['erro']) ? $_GET['erro']: 0;

	require_once('db.class.php');

	$objDB = new db();
    $link = $objDB->conecta_mysql();

	$id_cliente = $_SESSION['id_cliente'];
	$empresa_cliente = $_SESSION['empresa_cliente'];

	$sql = "SELECT date_format(data_tornou_cliente, '%d %b %Y') AS data_tornou_cliente FROM cliente_acesso WHERE id_cliente = $id_cliente";

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
		<script type="text/javascript">
			function lista_historico(){
				$.ajax({
					url: 'historico_avaliacoes.php',
					success: function(data){
						$('#lista').html(data);
					}
				});
			}
			lista_historico();
		</script>
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
			        	<?php
							if($erro == 1){
								echo '<li><a href="avaliacao_do_cliente.php" style="color: red;">Você possui avaliações pendentes</a></li>';
							}
						?>			            
			            <li><a href="Sobre.php">Sobre</a></li>
			            <li><a href="doLogout.php">Sair</a></li>
			        </ul>
	        	</div>
	      	</div>
	    </nav>
	    <div class="container">
	      	<div class="col-md-3">
	      		<br>
				<div class="profile-sidebar">
					<div class="profile-usertitle">
						<div>
							<h3><?= $_SESSION['username_cliente']?></h3>
						</div>
						<div>
							<label>Empresa: </label> <?= $_SESSION['empresa_cliente']?>
						</div>
						<div>
							<label>Cliente desde: </label> <?= $data_tornou_cliente ?>
						</div>
					</div>
					<div class="profile-usermenu">
						<ul class="nav">
							<li>
								<a href="#">
									<i class="glyphicon glyphicon-flag"></i>
									Informações do contrato 
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	      	<div class="col-md-9">
	      		<h3>Histórico de Avaliações</h3>
		        <table class="table">
					<thead class="thead-dark">
					    <tr>
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
					      
					</tbody>
				</table>
		    </div>  			
	    </div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>