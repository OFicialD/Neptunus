<?php
    session_start();
    //verifica se ja foi curtido
    if($_CURTIR['curtiu']){
        echo 'Você curtiu já curtiu esse vídeo';
    }else{
    //adicionando curtida
    include_once('conexao.php');
    $likes = $_SESSION['likes'];
    $contid = $_SESSION['contid'];
    $likes += 1;
    $query = "UPDATE conteudo SET likes='$likes' WHERE contid='$contid'";
    $resultado = pg_query($con, $query);
    $_CURTIR['curtiu'] = true;
    header("Location: video.php?j={$contid}");
    }
?>
