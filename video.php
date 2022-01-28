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
        include("cabecalho.php"); 
        include_once("conexao.php");
        session_start();

        //consulta da tabela conteudo 
        $contid = $_GET['j'];   
        $query = "SELECT * FROM conteudo WHERE contid = '$contid' ORDER BY contid desc";
        $resultado = pg_query($con, $query);
        $dados = pg_fetch_array($resultado);
        $link  = $dados['link'];
        $likes = $dados['likes'];
        $descricao = $dados['descricao'];
        $autor = $dados['nome'];

        //echo do html da página
        echo "<h2>Vídeo selecionado</h2><br>
        <iframe width=\"1000\" height=\"500\" src=\""
        .$link.
        "\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
        ";

        //Montando layout de likes, autor e descrição abaixo do vídeo
        $_SESSION['likes']  = $likes;
        $_SESSION['contid'] = $contid;
        echo "<br><br>Autor:$autor<form method=\"POST\" action=\"curtir_video.php\">
        $likes Curtiram    <button type=\"submit\">Curtir</button></form>
        $descricao";
        
        
        include('comentarios.php') ;
        include("rodape.php"); ?>
	</body>
</html>