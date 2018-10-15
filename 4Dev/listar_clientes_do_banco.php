<?php
	session_start();

	if(!$_SESSION['username_funcionario']){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

    $id_funcionario = $_SESSION['id_funcionario'];

    $objDB = new db();
    $link = $objDB->conecta_mysql();
    
    $sql = "SELECT id_avaliacao, id_empresa, razao_social, pessoa_responsavel, sinalizador, date_format(data_tornou_cliente, '%d %b %Y') AS data_tornou_cliente, realizou_avaliacao, date_format(data_tornou_cliente, '%d %b %Y') AS data_avaliacao, nota_avaliacao FROM avaliacao ORDER BY id_avaliacao ASC ";

    $resultado_id = mysqli_query($link, $sql);

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
                </tr>';
        }
    }else{
        echo 'Erro na consulta no banco de dados!';
    }
?>