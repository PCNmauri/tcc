<?php
    //$erro = isset($_GET['erro']) ? $_GET['erro'] : null
    if(($_POST['nomearq'] != "") && ($_FILES['arquivo'] ['name'] != "")){
        $nomearq = isset($_POST['nomearq']) ? $_POST['nomearq'] : null;

    //echo'Este script PHP recebe um arquivo e salva o arquivo na pasta \'enviados\' dentro deste site <br> <br>';
    
    //echo'Conteudo da variavel nativa $_FILES:<br><br>';
    
    //echo 'name (nome original do arquivo na maquina do usuario): '.$_FILES['arquivo'] ['name'].'<br>';
    
    //pasta dentro do site onde serão salvos os arquivos enviados
    $dir = 'enviados';
    // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    if ($_FILES['arquivo'] ['error'] != 0)  {
        die ("Não foi possivel fazer o upload <br>");
        exit; //para a execução do script
    }

    //se o tipo do arquivo não for jpeg ou png, rejeita
    if (!($_FILES['arquivo'] ['type'] == "image/jpeg") || ($_FILES ['arquivo'] ['type'] == "image/png" || ($_FILES ['arquivo'] ['type'] == "image/bmp")))    {
       echo "Por favor, envie arquivos com as seguintes extensões: jpeg, png ou bmp";
        exit; // Para a execução do script
    }

    //faz a verificação do tamanho do arquivo
    //$tam_max = 1024 * 1024 * 5; //5mb
    //if ($_FILES ['arquivo'] ['size'] > $tam_max) {
    //   echo "O arquivo enviado é muito grande, envie arquivos de até 5mb.";
    //    exit; //Para a execuçao do script
    //}

    //O arquivo passou todas as verificações, hora de tentar movê-lo para a pasta

    // Cria o nome baseado no TIMESTAMP atual e com extensão .jpg
    // Aqui podemos utilizar alguma informação do úsuario para criar nomes de arquivos personalisados 
    $nome_final = $nomearq;

    // Pasta onde o arquivo vai ser salvo
    $dir = 'enviados';

    // Verifica se é possível mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['arquivo'] ['tmp_name'], $dir. '/'. $nome_final)) {

        //Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
        echo "Upload efetuado com sucesso!";
        echo '<br><a href"'. $dir . '/' . $nome_final . '"> Clique aqui para acessar o arquivo </a>';
    } else{
        //Não foi possível fazer o upload, provavelmente a pasta esta incorreta
        echo "Não foi possível enviar o arquivo, tente novamente";


    }
    //move o arquivo da pasta temporaria do servidor para a pasta do site
    
    

    echo '<img src = " '.$dir.'/'.$nome_final.'"/>';

}
    else{
        header("Location: principal.php?erro=1");
    }
    echo($_FILES ['arquivo'] ['type']);
    
?>
<a href=principal.php>Voltar</a>
	