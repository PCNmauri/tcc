<meta charset="utf-8">
<html>
    <head>
        <title>Login</title>
    </head>
    
    <?php

    $erro = isset($_GET['erro']) ? $_GET['erro'] : null;

	if ( $erro == 1) {
        
		echo "Login ou senha errado(s):<br><br>";
        
    } else{
        echo $erro;
    }
    

    ?>
    
<body>
    <center>
    
        <h1>Bem vindo!</h1>
        
        <form action="verifica.php" method="post">
        
		Login: <input type="text" name="nome"/>
        
		<br><br>
        
		Senha: <input type="password" name="senha"/>
        
		<br><br>
        
		<input type="submit" name="enviar" value="Entrar">
        
	</form>
    <a href=cadastro.php>Cadastrar</a>
    <br>
    <a href=../site>Voltar</a>
        
    </center>
</body>
</html>