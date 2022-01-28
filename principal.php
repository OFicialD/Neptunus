<?php
session_start();
$NomUser = $_SESSION['nome'];
$IdUser  = $_SESSION['userid'];
//exibindo a segunda barra de navegação e outros elementos html 
echo "
<nav>
    <div class=\"div\">
        <a href=\"index.php?p=cadastro\">Postar</a>
        <a href=\"index.php?p=populares\">Mais Populares</a>
        <a href=\"index.php?p=seguindo\" >Seguindo</a>
        <a href=\"perfil.php?p=$IdUser\" style=\"position: absolute; right: 0px;\">$NomUser</a>
    </div>
</nav>
        <h2>Ultimos videos adicionados</h2>

        <table class=\"alinhamento\">
            <tr>
";
            include('conexao.php');
            //consulta da tabela conteudo 
            $query = 'SELECT * FROM conteudo ORDER BY contid desc';
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
        