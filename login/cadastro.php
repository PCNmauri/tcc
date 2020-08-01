<html>

<style>
	#text {display:none;}
</style>

<?php
    
	include_once ("conexao.php");
?>
    
<form method = "post" action = "">
	nome
	<br>
    <input type = "text" name = "nome">
	<br>
	senha
	<br>
	<input type = "password" name = "senha" id="myInput">
	<p id="text">Caps lock está ativado.</p>
	<br>
    <input type = "submit" name = "submit" value = "Cadastrar">
</form>

<?php
	$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
	if($erro == 1){
		echo "Este nome já existe";
	}
?>
<br>
<a href=../site>Voltar</a>
<script>
var input = document.getElementById("myInput");
var text = document.getElementById("text");
input.addEventListener("keyup", function(event) {

if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
  } else {
    text.style.display = "none"
  }
});
</script>
    
    <?php
    
        if(isset($_POST['submit'])){
			
			if ( ($_POST['nome'] == "") || ($_POST['senha'] == "")){
				
				echo "preencha todos os campos!";
				
            } else {
				$nomePost = isset($_POST['nome']) ? $_POST['nome'] : null;
				$senhaPost = isset($_POST['senha']) ? $_POST['senha'] : null;
				$sql = "select cod_usuario, nome, senha from usuario where nome = :n";
				$query = $conn->prepare($sql);
				$query->bindParam(":n", $nomePost);	
				
				if($query->execute()){
				
					$num = $query->rowCount();
					
					if ($num > 0){	
						/*
						// puxa uma linha dos resultados contidos no objeto $query e armazena na variável $lin
						$lin = $query->fetch(PDO::FETCH_ASSOC);
			
						// exibe a coluna 'id' da linha de resultado
						echo "cod_usuario:" . $lin['cod_usuario'] . "<br>";
						
						// exibe a coluna 'nome' da linha de resultado
						echo "nome:" . $lin['nome'] . "<br>";
						*/
						
                        header ("Location: cadastro.php?erro=1");
                        
						
					} else {
						
							//config e conn para o banco 
							$sql = "insert into usuario (nome, senha) values (:n, :s)";
							$query = $conn->prepare($sql);
							$query->bindParam(":n", $nomePost);
							$password = crypt($senhaPost);
                            $query->bindParam(":s", $password);
						
							if($query->execute()){
                                header("Location: Login.php");
							} else {
								echo "falhou";
							}						
				
					}
				}
			}
		
		}
	?>
</html>    