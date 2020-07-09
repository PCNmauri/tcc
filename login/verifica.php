<?php

include_once ("conexao.php");

?>


<?php
    session_start();
    
    $nome = isset($_POST['nome'])? $_POST['nome'] : null;
    $senha = isset($_POST['senha'])? $_POST['senha'] : null;
    $_SESSION['usuario'] = $nome;

    $query = "select * from usuario where nome = '$nome' and senha = '$senha'";
    $consulta = mysqli_query($conexao, $query);

    if (mysqli_num_rows($consulta) == 1){
        $_SESSION['nome'] = true;
        $nome = $_SESSION['nome'];
        header("Location: principal.php");
        die();
    } else{
        header("Location: Login.php?erro=1");
        die();
    }
 
?>