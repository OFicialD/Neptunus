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
			<?php include("cabecalho.php"); ?>

			<?php 

			if (isset($_GET['p'])){
				$pag = $_GET['p'];
				if ($pag == "cadastro")
					include("cadastro.php");
				if ($pag == "principal")
					include("principal.php");
				if ($pag == "login")
					include("login.php");	
				if ($pag == "comunidade")
					include("comunidade.php");
				if ($pag == "sobre")
					include("sobre.php");
				if ($pag == "contato")
					include("contato.php");
			} else{
				include("login.php");
			}
			?>
			
			<?php include("rodape.php"); ?>
	</body>
</html>
