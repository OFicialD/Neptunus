<?php
if(isset($_POST['form'])){
	//validação e sanitização
	if(!filter_var($usuario, FILTER_VALIDATE_EMAIL)){
		$erros[] = "Email inválido"; 
	}
    echo "passou pelo filter";
}

    if(isset($erros)){
        foreach ($erros as $erro){
			echo "<li>$erro</li></br>";
		}
        $erros = array();
    }

?>

<?php
	require_once 'conexao.php';
	session_start();

	//sanitiação para SQL
	$usuario = pg_escape_string($con,$_POST['email']);
    $nome    = pg_escape_string($con,$_POST['nome']);
	$senha1  = pg_escape_string($con,$_POST['senha']);
	$idade   = pg_escape_string($con,$_POST['idade']);


	//validação 
	if(!filter_var($usuario, FILTER_VALIDATE_EMAIL)){
		$erros[] = "Email inválido"; 
	}
	if(!filter_var($idade, FILTER_VALIDATE_INT)){
		$erros[] = "Idade inválida"; 
	}


	$nome    = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$senha1  = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);


	//criptografando(md5) e validando senha
	$senha2 = pg_escape_string($con, $_POST['senha2']); 
	if($senha1 == $senha2){
		$senha = md5($senha2); //criptografando em md5
	}else{ 
		$serros[]= "Senhas não coincidem";
	}



	//Procura se o email ja foi registrado
	$query = "SELECT * FROM usuario WHERE email ='$usuario'";
	$consulta= pg_query($con,$query);
	$dados = pg_fetch_array($consulta);
	$quant=pg_num_rows($consulta);
	
	if($quant == 0){
		//$query = "INSERT INTO usuario (nome, senha, email, idade) VALUES ('$nome', '$senha', '$usuario', '$idade')";
		//$registro = pg_query($con, $query);
		$erros[] = "Usuário cadasrado com Sucesso";
		$_SESSION['arrayerros'] = $erros;
		header('location: d.php');
	}else{
		$erros[] = "Esse email já foi registrado";
		$_SESSION['arrayerros'] = $erros;
		header('location: d.php');
	}
?>