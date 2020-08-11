<?php

include_once ("conexao.php");

?>


<?php
    session_start();
    
    $nomePost = isset($_POST['nome']) ? $_POST['nome'] : null;
    $senhaPost = isset($_POST['senha']) ? $_POST['senha'] : null;
    $sql = "select nome, senha from usuario where nome = :n";
    $query = $conn->prepare($sql);
    $query->bindParam(":n", $nomePost);		
    
    if($query->execute()){
				
        $num = $query->rowCount();
        
        if ($num > 0){	

            // puxa uma linha dos resultados contidos no objeto $query e armazena na variável $lin
            $lin = $query->fetch(PDO::FETCH_ASSOC);
            if (crypt($senhaPost, $lin['senha']) == $lin['senha']) { 
                $_SESSION['nome'] = true;
                header("Location: ../site/index.html");
                die();
            } else{
                header("Location: Login.php?erro=1");
                die();
             }
        }
        else{
            echo "usuario não encontrado";
        }
    }
    else{
        echo "erro na execução";
    }
 
?>