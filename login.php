
<div>
    <div>
		<h2>sign in</h2>
        <form method="POST" action="valida.php">
			Email<br>
			<input type="text" name="email"><br><br>
			Senha<br>
			<input type="password" name="senha"><br><br>
			<button type="submit">Entrar</button>
        </form>


        <p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</div>
