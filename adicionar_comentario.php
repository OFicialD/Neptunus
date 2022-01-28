<?php
session_start();
include('conexao.php');
$comentario = $_POST['comentario'];

$contid = $_SESSION['contid'];
$userid = $_SESSION['userid'];
$likes  = 0;
$query = "INSERT INTO usercomment (contid, userid, texto, likes) VALUES ('$contid', '$userid', '$comentario', '$likes')";
if (pg_query($con, $query)) {
    echo "Novo comentário registrado com sucesso";
    header("location: video.php?j=$contid");
}else {
echo "Comentário não registrado";
header("location: video.php?j=$contid");
}

?>