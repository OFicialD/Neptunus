<?php session_start(); ?>
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
		<h2>sign in</h2>
        <form method="POST" action="valida.php">
			Email<br>
			<input type="text" name="email"><br><br>
			Senha<br>
			<input type="password" name="senha"><br><br>
			<button type="submit">Entrar</button>
			<p>Ou então, <a href="registro.php" style="color:white;">Registre-se</a></p>
        </form>

        <p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br>
    </div>
</div>
<?php include("rodape.php"); ?>
	</body>
</html>
