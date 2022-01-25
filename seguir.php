




<?php 
session_start();
include('conexao.php');
//recebendo variável enviada pelo "button"
if (isset($_GET['s'])){
    $seguindo = $_GET['s'];
}else{
    $seguindo = $_SESSION['seguindo'];
}


$seguidor = $_SESSION['userid'];
//montando query
$resultado = pg_query($con, "SELECT  *
FROM    seguir 
WHERE   seguindo = '$seguindo' 
AND     seguidor = '$seguidor'");
if(empty(pg_fetch_array($resultado))){
    $query= "INSERT INTO seguir (seguindo, seguidor) VALUES ('$seguindo', '$seguidor')";
    if (pg_query($con, $query)){
        $_SESSION['s_error'] ='Você seguiu esse usuário';
        header("location: perfil.php?p=$seguindo");
    }else{
        $_SESSION['s_error'] ='Erro ao seguir';
        header("location: perfil.php?p=$seguindo");
    }
}else{
    $_SESSION['s_error'] = 'Você ja segue esse usuario';
    header("location: perfil.php?p=$seguindo");
}
?>
