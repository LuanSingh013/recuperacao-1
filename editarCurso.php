<?php
    include_once("./class/Curso.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
    <?php

        $u = new Curso();
        $u->buscarCurso($_GET["id"]);

        echo "
            <form method='POST'>

            <label>Nome:</label>
            <input type='text' name='nome' value='" . $u->getNome() . "' required><br><br>

            <label>Nível:</label>
            <input type='text' name='nivel' value='" . $u->getNivel() . " ' required><br><br>

            <label>Duração:</label>
            <input type='text' name='duracao' value='" . $u->getDuracao() . "' required><br><br>

            <label>Valor Total:</label>
            <input type='text' name='valorTotal' value='" . $u->getvalorTotal() . "' required><br><br>
            
            <label>Descrição:</label>
            <input type='text' name='descricao' value='" . $u->getDescricao() . "' required><br><br>

            <button type='submit' name='atualizar'>Atualizar</button>
            <button type='button'><a href='listarCurso.php' id='botaoVoltar'>Cancelar</a></button>
        ";

        if ( isset($_REQUEST["atualizar"]) )
        {
            $u->create($_REQUEST["nome"], $_REQUEST["nivel"], $_REQUEST["duracao"], $_REQUEST["valorTotal"], $_REQUEST["descricao"]);

            echo $u->atualizarCurso($_GET["id"]) == true ?
                    "<p class='mensagemSucesso'>Curso editado com sucesso.</p>" . header("Location: listarCurso.php") :
                    "<p class='mensagemErro'>Ocorreu um erro ao editar.</p>";
        }
    ?>

</form>
</body>
</html>