<html>

<?php
    
include_once ("conexao.php");
    
?>
    
<form method = "post" action = "">
    <input type = "text" name = "nome">
    <input type = "password" name = "senha">
    <input type = "submit" name = "submit" value = "Cadastrar">
</form>
    
    <?php
    
        if(isset($_POST['submit'])){
            $nomePost = isset($_POST['nome']) ? $_POST['nome'] : null;
            $senhaPost = isset($_POST['senha']) ? $_POST['senha'] : null;
            $sql = "select id, nome, senha from usuario where nome = :n and senha = :s";
            $query = $conn->prepare($sql);
            $query->bindParam(":n", $nomePost);		
            $query->bindParam(":s", $senhaPost);
			
			
			if ( ($_POST['nome'] == "") || ($_POST['senha'] == "")){
				
				echo "preencha todos os campos!";
				
            } else {
				
				if($query->execute()){
				
					$num = $query->rowCount();
					
					if ($num > 0){	
			
						// puxa uma linha dos resultados contidos no objeto $query e armazena na variável $lin
						$lin = $query->fetch(PDO::FETCH_ASSOC);
			
						// exibe a coluna 'id' da linha de resultado
						echo "id:" . $lin['id'] . "<br>";
						
						// exibe a coluna 'nome' da linha de resultado
						echo "nome:" . $lin['nome'] . "<br>";
						
						echo "nome existente";
                        header ("Location: Login.php");
                        
						
					} else {
						
							//config e conn para o banco 
							$sql = "insert into usuario (nome, senha) values (:n, :s)";
							$query = $conn->prepare($sql);
							$query->bindParam(":n", $nomePost);
                            $query->bindParam(":s", $senhaPost);
						
							if($query->execute()){
								echo "usuario cadastrado com sucesso";
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