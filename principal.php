        <h2>Ultimos videos adicionados</h2>

        <table class="alinhamento">
            <tr>
            <?php
            include('conexao.php');

            //consulta da tabela conteudo 
            $query = 'SELECT * FROM conteudo ORDER BY contid desc' or die("Erro ao tentar cadastar o registro");
            $resultado = pg_query($con, $query);
            
            $contador = 1;
            while($registro = pg_fetch_array($resultado)){
                
                $nome = $registro['nome'];
                $link = $registro['link'];
                echo "<td> <iframe width=\"500\" height=\"280\" src=\""
                .$link.
                "\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe> 
                <br>Autor: $nome</td>\n";

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