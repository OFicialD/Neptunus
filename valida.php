<?php
	require_once 'conexao.php';
	session_start();
	//prevenindo sql inject
	$usuario = pg_escape_string($con,$_POST['email']);
	$senha1 = pg_escape_string($con,$_POST['senha']);

	//sanitização
	$usuario    = filter_var($usuario, FILTER_SANITIZE_EMAIL);
	$senha1   = filter_var($senha1, FILTER_SANITIZE_SPECIAL_CHARS);

	$senha = md5($senha1); //criptografando senha em md5

	//Busca nas tabelas as correspondências de Email e Senha
	$query = "SELECT * FROM usuario WHERE email ='$usuario' AND senha='$senha'";
	$consulta= pg_query($con,$query);
	$dados = pg_fetch_array($consulta);
	$quant=pg_num_rows($consulta);
	
	if($quant>0){
		$_SESSION['nome']   = $dados['nome'];
		$_SESSION['userid'] = $dados['userid'];
		$_SESSION['email']  = $dados['email'];
		header('location: index.php?p=cadastro');
	}else{
		$_SESSION['loginErro'] = "Usuario ou senha não encontrados";
		header('location: index.php?p=login');
	}
?>