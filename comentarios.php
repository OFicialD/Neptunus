<?php
//buscar comentários do vídeo no bancco de dados
$query = "SELECT * FROM usercomment WHERE contid = '$contid' ORDER BY commentid desc";
$resultado = pg_query($con, $query);

echo "<div class='comentario'><br><br><br><h3>Comentários</h3>";

//inserir comentário
echo"
<table align=\"center\" width=\"600\" height=\"200\" alig>
<td>
<form action=\"adicionar_comentario.php\" method=\"post\">
<textarea name=\"comentario\" id=\"comentario\" width=\"600\" height=\"200\">
</textarea>
<br>

<input action=\"adicionar_comentario.php\" type=\"submit\" value=\"Comentar\">
</form>
</td>
</table>";

//exibir comentarios
while($dados = pg_fetch_array($resultado)){
    $comentario = $dados['texto'];
    $userid     = $dados['userid'];
    $likes      = $dados['likes'];

    //buscar nome do usuário
    $query = "SELECT * FROM usuario WHERE userid = '$userid'";
    $q_nom = pg_query($con, $query);
    $arraynom = pg_fetch_array($q_nom);
    $nome =  $arraynom['nome'];
    echo
    "<br><br><div class='comentario'><td>
    <a href=\"perfil.php?p=$userid\" style=\"color:cyan;\">$nome</a><br>
    $comentario<br>
    </td></div>";
    
}