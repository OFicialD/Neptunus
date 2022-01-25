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

    // Recebe os dados e guarda-os em variáveis
    $nome = $_SESSION['nome'];
    $linkTemp = $_GET['link'];

    //dados do banco de dados
    $host = "kashin.db.elephantsql.com";
    $user = "udelhnwy";
    $pass = "XD1Cbv1phrgq9OmqtFNs_nRGYiIUfWSn";
    $db = "udelhnwy";

    // conexão ao banco de dados em PostgreSQL 
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n");

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
    $query = "INSERT INTO conteudo (nome, link) VALUES ('$nome', '$link')";

    if (pg_query($con, $query)) {
        echo "Novo vídeo registrado com sucesso";
    }else {
    echo "Vídeo não registrado";
    echo "Error: " . $sql . "<br>" . mysqli_error($con); 
    }
    include("cadastro.php");
    include("rodape.php");
?>
</body>
</html>
