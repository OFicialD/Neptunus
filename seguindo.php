<h2>Videos dos usuários que você segue</h2>

<table class="alinhamento">
    <tr>
    <?php
    include('conexao.php');
    session_start();

    //consultando perfis que o usuário segue
    $usuario = $_SESSION['userid'];

    //consulta da tabela conteudo somente dos perfis que o usuário segue
    $query = "SELECT * FROM conteudo INNER JOIN seguir ON seguir.seguindo = conteudo.userid WHERE seguidor = '$usuario'";
    $resultado = pg_query($con, $query);
    $contador = 1;
    //exibição dos vídeos
    while($registro = pg_fetch_array($resultado)){
        $nome   = $registro['nome'];
        $link   = $registro['link'];
        $contid = $registro['contid'];
        $likes = $registro['likes']; 

        echo "<br><br><br><td><iframe width=\"500\" height=\"280\" src=\""
        .$link.
        "\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe> 
        <br>Curtidas: $likes<br>
        <table>
        <a href=\"video.php?j=$contid\" style=\"color:white;\" >Curtir  |  Comentar  |  Ver Comentários</a>
        </table>
        </td>\n";

        //organiza a forma de exibição dos vídeos
        if ($contador%2 == 0){
            echo "</tr>\n";
        }
        if ($contador%2 == 0 and $contador > 2){
            echo "<tr>\n";
        }
        
        $contador += 1;
    }
    ?>
</table>