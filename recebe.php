<?php

    if(($_POST['nomearq'] != "") && ($_FILES['arquivo'] ['name'] != "")){
        $nomearq = isset($_POST['nomearq']) ? $_POST['nomearq'] : null;

        
        
        if ($_FILES['arquivo'] ['error'] != 0)  {
            die ("Não foi possivel fazer o upload <br>");
            exit; //para a execução do script
        }

        switch($_FILES['arquivo'] ['type']){
            case "image/jpeg":
                $nome_final = $nomearq.".jpeg";
            break;
            case "image/jpg":
                $nome_final = $nomearq.".jpg";
            break;
            case "image/png":
                $nome_final = $nomearq.".png";
            break;
            case "image/bmp":
                $nome_final = $nomearq.".bmp";
            break;
            case "application/pdf":
                $nome_final = $nomearq.".pdf";
            break;
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                $nome_final = $nomearq.".docx";
            break;
            case "text/plain":
                $nome_final = $nomearq.".txt";
            break;
            default:
            echo("Formato de arquivo não encontrado");
            exit;
        }

        // Pasta onde o arquivo vai ser salvo

        $dir = '../site/images/americo/';


        if (move_uploaded_file($_FILES['arquivo'] ['tmp_name'], $dir. '/'. $nome_final)) {

            //Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
            echo "Upload efetuado com sucesso!";
            echo '<br><a href"'. $dir . '/' . $nome_final . '"> Clique aqui para acessar o arquivo </a>';
        } else{
            //Não foi possível fazer o upload, provavelmente a pasta esta incorreta
            echo "Não foi possível enviar o arquivo, tente novamente";
        }
    }
    else{
        header("Location: principal.php?erro=1");
    }
    $a1 = $nome_final;
    echo($_FILES ['arquivo'] ['type']);  
?>
<a href=principal.php>Voltar</a>

	