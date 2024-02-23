<?php
    include_once('./class/Curso.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
<div>
            <h2>Cadastre-se aqui</h2>
            <form method="post" id="formCadastro">
                
                <label for="nome">Nome:</label>
                <input type="text" placeholder="Informe o curso" name="nome" required>
                
                <label for="nivel">nível:</label>
                <input type="text" placeholder="Informe o nível" name="nivel" required>
                
                <label for="duracao">Duração:</label>
                <input type="text" placeholder="Informe a duração" name="duracao" required>
                
                <label for="valorTotal">Valor Total:</label>
                <input type="text" placeholder="Informe o valor" name="valorTotal" required>
                
                <label for="descricao">Descrição:</label>
                <input type="text" placeholder="Informe a descrição do curso" name="descricao" required>
                
                

                <?php
                    if (isset($_REQUEST["cadastrar"])) {
            
                        $u = new Curso();
                        $u->create($_REQUEST["nome"], $_REQUEST["nivel"], $_REQUEST["duracao"], $_REQUEST["valorTotal"], $_REQUEST["descricao"]);

                        echo $u->inserirCurso() == true ? "
                        <span class='mensagemSucesso'>Curso Cadastrado!</span>" : 
                        "<span class='mensagemErro'>Ocorreu um erro.</span>";
                    }
                ?>
                
                <button type="submit" class="formBotao" name="cadastrar">Cadastrar</button>
            </form>
        </div>

            <section class="imagemLateral">
                <img src="./assets/cadastroImagem.jpg" id="imagemCadastro" alt="">
            </section>
        </section>
    </main>

    
</body>
</html>