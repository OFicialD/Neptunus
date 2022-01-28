<?php session_start(); 
    if(isset($_SESSION['arrayerros'])){
		$erros = $_SESSION['arrayerros'];
        foreach ($erros as $erro){
			echo "<li>$erro </li></br>";
		}
        unset($_SESSION['arrayerros']);
    }
?>
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
	<nav>
		<div class="div">
			<a>Bem Vindo ao Neptunus, a Rede Social de Curtas</a>
		</div>
	</nav>
<div>
    <div>
		<h2>Registro</h2>
        <form method="POST" action="registro_validacao.php">
			Email<br>
			<input type="text" name="email"><br><br>
			Nome<br>
			<input type="text" name="nome"><br><br>
            Idade<br>
			<input type="number" name="idade"><br><br>
			Senha<br>
			<input type="password" name="senha"><br><br>
            Confirme<br>
			<input type="password" name="senha2"><br><br>
			<button type="submit" name="form">Registrar</button>
			<p>Voltar ao <a href="login.php" style="color:white;">Log In</a></p>

        <p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</div>
<?php include("rodape.php"); ?>
	</body>
</html>