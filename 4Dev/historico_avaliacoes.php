<?php
	session_start();

	if(!$_SESSION['username_cliente']){
		header('Location: login_cliente.php?erro=2');
	}

	require_once('db.class.php');

    $id_cliente = $_SESSION['id_cliente'];

    $objDB = new db();
    $link = $objDB->conecta_mysql();
    
    $sql = "SELECT id_avaliacao, id_empresa, razao_social, pessoa_responsavel, sinalizador, date_format(data_tornou_cliente, '%d %b %Y') AS data_tornou_cliente, realizou_avaliacao, date_format(data_avaliacao, '%d %b %Y') AS data_avaliacao, nota_avaliacao FROM avaliacao WHERE id_empresa = '$id_cliente' ORDER BY data_avaliacao DESC ";

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '
                <tr>
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