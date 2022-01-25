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
			<?php include("cabecalho.php"); 
			session_start();
				  //recebendo variável enviada pelo "button"
				if (isset($_GET['p'])){
					$userid = $_GET['p'];
				}else{
					$userid = $_SESSION['userid'];
				}				  
				  
				  //puxando dados do usuário do BD
				  include("conexao.php");
				  $query     = "SELECT * FROM usuario WHERE userid = '$userid'";
				  $resultado = pg_query($con, $query);
				  $dados     = pg_fetch_array($resultado);
				  $nome = $dados['nome'];
				  
				  
				  //imprimindo tela
				  echo"<h1>Vídeos de $nome</h1><br>
						<form method='get' action=\"seguir.php?s=$userid\"><input type='submit' value='Seguir'/></form>";
				
					//seguiu usuario
					if(isset($_SESSION['s_error'])){
						echo $_SESSION['s_error'];
						$_SESSION['s_error'] = '';
					}
				  
				  
				  //puxando videos postados pelo usuário
				  $query     = "SELECT * FROM conteudo WHERE userid = '$userid'";
				  $resultado = pg_query($con, $query);
				  $contador = 1;
				  $_SESSION['seguindo'] = $userid;
				while($registro = pg_fetch_array($resultado)){

					$nome   = $registro['nome'];
					$link   = $registro['link'];
					$contid = $registro['contid'];
					$likes = $registro['likes']; 

					echo "<br><br><br><td><iframe width=\"500\" height=\"280\" src=\""
					.$link.
					"\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe> 
					<br>Curtidas: $likes<br>
					<table>
					<a href=\"video.php?j=$contid\" style=\"color:white;\" >Curtir  |  Comentar  |  Ver Comentários</a>
					</table>
					</td>\n";

					//organiza a forma de exibição dos vídeos
					if ($contador%2 == 0){
						echo "</tr>\n";
					}
					if ($contador%2 == 0 and $contador > 2){
						echo "<tr>\n";
					}
					
					$contador += 1;
					}
					?>

			
			
			<?php include("rodape.php"); ?>
	</body>
</html>