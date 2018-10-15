<?php
	class db{
		//host
		private $host = 'localhost';

		//usuario
		private $usuario = 'root';

		//senha
		private $senha = '';

		//banco de dados
		private $database = 'fordev';

		public function conecta_mysql(){
			//cria a conexão
			$con = mysqli_connect($this -> host, $this -> usuario, $this -> senha, $this -> database);

			//ajustar o charset de comunicação entre a aplicação e o banco de dados
			mysqli_set_charset($con, 'utf8');

			//verificar se houve erro de conexão
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar conectar com o BD MySql'. mysqli_connect_error();
			}

			return $con;
		}
	}
?>