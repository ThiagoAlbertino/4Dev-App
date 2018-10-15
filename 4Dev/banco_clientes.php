<?php
	session_start();

	if(!$_SESSION['username_funcionario']){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

    $id_funcionario = $_SESSION['id_funcionario'];

    $objDB = new db();
    $link = $objDB->conecta_mysql();
    
    $sql = "SELECT id_cliente, empresa_cliente, date_format(data_tornou_cliente, '%d %b %Y') AS data_tornou_cliente FROM cliente_acesso";

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '
                <tr>
                    <th scope="row">'.$registro['id_cliente'].'</th>
                    <td>'.$registro['empresa_cliente'].'</td>
                    <td>'.$registro['data_tornou_cliente'].'</td>
                </tr>
            ';      
        }
    }else{
        echo 'Erro na consulta de tweets no banco de dados!';
    }
?>