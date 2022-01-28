
    <?php session_start();
    $erros = $_SESSION['arrayerros']; 
        if(isset($erros)){
            foreach ($erros as $erro){
                echo "<li>$erro </li></br>";
            }
            unset ($erros);
        }
    ?>
    <div>
        <div>
            <h2>Registro</h2>
            <form method="POST" action="dd.php">
                Email<br>
                <input type="text" name="email"><br><br>
                Nome<br>
                <input type="text" name="nome"><br><br>
                Idade<br>
                <input type="number" name="idade"><br><br>
                Senha<br>
                <input type="password" name="senha"><br><br>
                Confirme<br>
                <input type="password" name="senha2"><br><br>
                <button type="submit" name="form">Registrar</button>
                <p>Voltar ao <a href="index.php?p=login" style="color:white;">Log In</a></p>
    
            <p class="text-center text-danger">
                <?php if(isset($_SESSION['loginErro'])){
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                }?>
            </p>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </div>