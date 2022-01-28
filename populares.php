<h2>Videos mais curtidos pelos usuários</h2>

<table class="alinhamento">
    <tr>
    <?php
    include('conexao.php');
    session_start();

    //consulta da tabela conteudo 
    $query = 'SELECT * FROM conteudo ORDER BY likes desc';
    $resultado = pg_query($con, $query);
    
    $contador = 1;
    while($registro = pg_fetch_array($resultado)){
        //salvando as informações de cada vídp
        $nome   = $registro['nome'];
        $userid = $registro['userid'];
        $link   = $registro['link'];
        $contid = $registro['contid'];
        $likes = $registro['likes'];
        
        //montando o iframe do miniplayer e exibindo as informações do vídeo(autor, likes)
        echo "<td> <iframe width=\"500\" height=\"280\" src=\""
        .$link.
        "\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe> 
        <br>Curtidas: $likes 
        <br>Autor: <a href=\"perfil.php?p=$userid\" style=\"color:white;\">$nome</a> <br><br>
        <table>
        <a href=\"video.php?j=$contid\" class='button' >Curtir  |  Comentar  |  Ver Comentários</a>
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
        
        unset ($_CURTIR);
    ?>
</table>