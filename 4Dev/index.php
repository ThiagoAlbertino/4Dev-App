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
	            		<li><a href="login_cliente.php">Área do Cliente</a></li>
	            		<li><a href="Sobre.php">Sobre</a></li>
	            		<li class="<?= $erro == 1 ? 'open' : ''?>">
	            			<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
							<ul class="dropdown-menu" aria-labelledby="entrar">	
								<div class="col-md-12">
					    			<p>Caso você seja um cliente, vá para a <a href="login_cliente.php">Área do Cliente</a></p>	
									<form method="post" action="valida_acesso.php">
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
	          		</ul>
	        	</div>
	      	</div>
	    </nav>
	    <div class="container">      	
	      	<div class="col-md-12">
		        <div class="container container-corpo">
		 			<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    			<ol class="carousel-indicators">
					      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					      	<li data-target="#myCarousel" data-slide-to="1"></li>
					      	<li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>
						<div class="carousel-inner">
					      	<div class="item active">
						        <img src="images/photo_1.png" alt="Foto 1" style="width:100%;">
						        <div class="carousel-caption">
						          	<h1>O que é</h1>
						          	<p class="texto_carrosel" style="text-align: justify;">
						          		Este aplicação foi desenvolvida com o intuito de auxiliar os funcionários de uma empresa, a obterem feedback de seus produtos por seus clientes, facilitando o agrupamento de análises positivas, neutras e negativas.
						          	</p>
						        </div>
					      	</div>
				    		<div class="item">
						        <img src="images/photo_2.png" alt="Foto 2" style="width:100%;">
						        <div class="carousel-caption">
						          	<h1>Lorem ipsum dolor</h1>
						          	<p class="texto_carrosel" style="text-align: justify;">
						          		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						          	</p>
						        </div>
						    </div>		    
					      	<div class="item">
						        <img src="images/photo_3.png" alt="Foto 3" style="width:100%;">
						        <div class="carousel-caption">
						          	<h1>Lorem ipsum</h1>
						          	<p class="texto_carrosel" style="text-align: justify;">
						          		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						          	</p>
						        </div>
					      	</div>
			    		</div>
					    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					      	<span class="glyphicon glyphicon-chevron-left"></span>
					      	<span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" data-slide="next">
					      	<span class="glyphicon glyphicon-chevron-right"></span>
					      	<span class="sr-only">Next</span>
					    </a>
		  			</div>
				</div>
		    </div>  	
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
	<footer>	
		<br>
		<p style="text-align: center;"> Desenvolvido por: 
			<a href="https://www.linkedin.com/in/thiago-albertino-assis-097693158/" target="_blank">Thiago Albertino Assis</a>, 10/2018
		</p>
	</footer>
</html>