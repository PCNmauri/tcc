<meta charset="utf-8">
<html>
    <head>
        <title>Login</title>
    </head>
    
    <?php

    $erro = isset($_POST['erro']) ? $_POST['erro'] : null;
    
	if ($erro == 1) {
        
		echo "Login ou senha errado(s):<br><br>";
        
	}

    ?>
    
<body>
    <center>
        
        <h1>Bem vindo!</h1>
        
        <form action="verifica.php" method="post">
        
		Login: <input type="text" name="login"/>
        
		<br><br>
        
		Senha: <input type="password" name="senha"/>
        
		<br><br>
        
		<input type="submit" name="enviar" value="Entrar">
        
	</form>
        
        <a href=testcad.php>Cadastrar</a>
        
    </center>
</body>
</html>