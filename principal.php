        <h2>Ultimos videos adicionados</h2>

        <table class="alinhamento">
            <tr>
            <?php
            include('conexao.php');
            session_start();

            //consulta da tabela conteudo 
            $query = 'SELECT * FROM conteudo ORDER BY contid desc' or die("Erro ao tentar cadastar o registro");
            $resultado = pg_query($con, $query);
            
            $contador = 1;
            while($registro = pg_fetch_array($resultado)){

                $nome   = $registro['nome'];
                $link   = $registro['link'];
                $contid = $registro['contid'];
                $likes = $registro['likes'];
                
                //armazena o id de cada vídeo 
                //$texto = 'video';
                //$varnom = $texto.$contid;
                //${$texto.$contid} = $contid;   

                echo "<td> <iframe width=\"500\" height=\"280\" src=\""
                .$link.
                "\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe> 
                <br>Curtidas: $likes 
                <br>Autor: $nome <br><br>
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
        