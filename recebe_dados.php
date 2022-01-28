<!DOCTYPE html>
<html>
	<header>
		<head>
			<title>Neptunus</title>
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="script/myscripts.js"></script>
		</head>
	</header>
	
		<body>
<?php
    session_start();
    include("cabecalho.php");
    include_once("conexao.php");

    //Prevenindo sql inject
    $titulo    = pg_escape_string($con,$_POST['titulo']);
    $linkTemp  = pg_escape_string($con,$_POST['link']);
    $descricao = pg_escape_string($con,$_POST['descricao']);
    $nome = $_SESSION['nome'];

    //sanitização
	$titulo    = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
    $linkTemp  = filter_var($linkTemp, FILTER_SANITIZE_URL);
	$descricao = filter_var($descricao, FILTER_SANITIZE_SPECIAL_CHARS);

    //dados do banco de dados
    $host = "kashin.db.elephantsql.com";
    $user = "udelhnwy";
    $pass = "XD1Cbv1phrgq9OmqtFNs_nRGYiIUfWSn";
    $db = "udelhnwy";

    /*
    // conexão ao banco de dados em PostgreSQL 
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n"); */

    //tranformar link para miniplayer
    $link = substr($linkTemp, 0, 24)."embed/".substr($linkTemp, (32-(strlen($linkTemp))));
    $i = 0;
    $marcador = 0;
    while ($i < strlen($link)){
        if($link[$i] == "&"){
            $marcador = $i;
            $link = substr($link, 0,$marcador);
        };
        $i += 1;
    }


    //query para adicionar no banco de dados
    $query = "INSERT INTO conteudo (nome, link, likes, descricao) VALUES ('$nome', '$link', '0', '$descricao')";

    if (pg_query($con, $query)) {
        echo "Novo vídeo registrado com sucesso";
    }else {
    echo "Vídeo não registrado";
    }
    include("cadastro.php");
    include("rodape.php");
?>
</body>
</html>
