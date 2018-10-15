<?php
	$erro = isset($_GET['erro']) ? $_GET['erro']: 0;
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
			            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
							<ul class="dropdown-menu" aria-labelledby="entrar">	
								<div class="col-md-12">
						    		<p>Caso você seja um cliente, vá para a 
						    			<a href="login_cliente.php">Área do Cliente</a>
						    		</p>
									<form method="post" action="valida_acesso.php" id="formLogin">
										<div class="form-group">
											<input type="text" class="form-control" name="username" placeholder="Usuário" />
										</div>
										<div class="form-group">
											<input type="password" class="form-control red" name="senha" placeholder="Senha" />
										</div>
										<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>
										<br><br>
									</form>
									<?php
										if($erro == 1){
											echo '<font color="#FF0000">Usuário e/ou senha incorreto(s)</font>';
										}
									?>
								</div>
						  	</ul>
			            </li>
			            <li><a href="#" value="Voltar" onclick="history.go(-1)">Voltar</a></li>
	          		</ul>
	        	</div>
	      	</div>
	    </nav>
	    <div class="container">
	      	<div class="col-md-4"></div>
	      	<div class="col-md-4">
		        <form method="post" action="valida_acesso_cliente.php" id="formLogin">
		        	<p>É cliente?<br> Digite seu usário e senha e acesse a área do cliente</p>
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Usuário" />
					</div>
					<div class="form-group">
						<input type="password" class="form-control red" name="senha" placeholder="Senha" />
					</div>		
					<button type="buttom" class="btn btn-primary">Entrar</button>
					<br><br>
					<?php
						if($erro == 2){
							echo '<font color="#FF0000">Usuário e/ou senha incorreto(s)</font>';
						}
					?>
					<br><br>									
					<p>É cliente e não possui login e senha?<br> 
					Contate-nos por email: <a href="#">exemplo@forlogic.com.br</a></p>	
				</form>
		    </div>  	
	      	<div class="col-md-4"></div>	
		</div>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>