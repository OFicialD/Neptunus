<?php
	require_once 'conexao.php';
	session_start();

	//prevenindo sql inject
	$usuario = pg_escape_string($con,$_POST['email']);
    $nome    = pg_escape_string($con,$_POST['nome']);
	$senha  = pg_escape_string($con,$_POST['senha']);
	$senha2  = pg_escape_string($con,$_POST['senha2']);
	$idade   = pg_escape_string($con,$_POST['idade']);

	//Verificando se os campos não estão vazios
	$contador = 0;
	foreach($_POST as $post => $valor){ 
		if ($valor == ""){ $contador += 1;}
	}
	if($contador>1){$erros[] = "Preencha todos os campos";}

	//validação e sanitização
	if(!filter_var($usuario, FILTER_VALIDATE_EMAIL)){
		$erros[] = "Email inválido"; 
	}
	if(!filter_var($idade, FILTER_VALIDATE_INT)){
		$erros[] = "Idade inválida"; 
	}
	//marcação "1" na variável pra mostrar q foi sanitizado
	$nome1    = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
	$senha1   = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);
	//comparação antes e pós sanitizar para verificar se ouve alteração e informar ao usuário
	if(!$nome1 == $nome){ 
		$erros[] = "Digite uma nome válido";
	}
	if($senha1 != $senha){ 
		$erros[] = "Digite uma senha válida";
	}

	//criptografando(md5) e validando senha
	if($senha1 == $senha2){
		$senha = md5($senha2); //criptografando em md5
	}else{ 
		$erros[]= "Senhas não coincidem";
	}

	//verifica se há erros antes de fazer as querys
	if(isset($erros)){
		$_SESSION['arrayerros'] = $erros;
		header('location: index.php?p=registro');
	}
	else{
		//Procura se o email ja foi registrado
		$query = "SELECT * FROM usuario WHERE email ='$usuario'";
		$consulta= pg_query($con,$query);
		$dados = pg_fetch_array($consulta);
		$quant=pg_num_rows($consulta);
		
		if($quant == 0){
			$query = "INSERT INTO usuario (nome, senha, email, idade) VALUES ('$nome', '$senha', '$usuario', '$idade')";
			$registro = pg_query($con, $query);
			$erros[] = "Usuário cadastrado com Sucesso";
			$_SESSION['arrayerros'] = $erros;
			header('location: index.php?p=registro');
		}else{
			$erros[] = "Esse email já foi registrado";
			$_SESSION['arrayerros'] = $erros;
			header('location: index.php?p=registro');
		}
	}
?>