<meta charset="utf-8">
<html>
	<head>
		<title> Main </title>
	</head>
	<body>
    <?php
        $erro = isset($_GET['erro']) ? $_GET['erro'] : null;
        

        if ( $erro == 1) {
    
        echo "Preencha todos os campos:<br><br>";
    
        } else{
            echo $erro;
        }
        ?>
        <h1> Escolha um arquivo para enviar </h1>
		
		<form method="post" action="recebe.php" enctype="multipart/form-data">
			<label>Selecione o arquivo: </label>
            <input type="file" name="arquivo"/><br><br>
            Nome do arquivo:<br>
            <input type="text" name="nomearq"/><br><br>
			<input type="submit" value="Enviar" />
        </form>
        
        <h1> Seus arquivos enviados </h1>
        
        <?php
            
            $path = "../site/images/americo/";
            $diretorio = dir($path);
 
            echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
            
            while($arquivo = $diretorio -> read()){
            
                echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
            
            }
            
            $diretorio -> close();
             
        ?>
        <form method="POST">
        <input type="submit" value="Voltar" name='button'>
        </form>
        
        <?php
            if(isset($_POST['button'])){
                header('Location:../site/index.html');
            }
        ?>
	</body>
</html>