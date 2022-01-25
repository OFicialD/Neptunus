<?php
	require_once 'conexao.php';
	//sanitiação
	session_start();
	$usuario = pg_escape_string($con,$_POST['email']);
	$senha = pg_escape_string($con,$_POST['senha']);

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