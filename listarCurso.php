<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    
    
    <script src="./utils/confirmar.js"></script>
    <title></title>
</head>
<body>
    

    <h1>Lista de Curso</h1>

    <?php
        include_once("./class/Curso.php");

        $u = new Curso(); 
        $listaDeCurso = $u->listarCurso();

        echo "<table>
            <tr>
                <th>Nome</th>
                <th>Nível</th>
                <th>Duração</th>
                <th>Valor Total</th>
                <th>Descrição</th>
            </tr>";

        foreach ($listaDeCurso as $curso) {
            echo 
                "<tr>
                    <td>" . $curso["nome"] . "</td>
                    <td>" . $curso["nivel"] . "</td>
                    <td>" . $curso["duracao"] . "</td>
                    <td>" . $curso["valorTotal"] . "</td>
                    <td>" . $curso["descricao"] . "</td>
                    <td> <a href='editarCurso.php?id=" . $curso["idCurso"] . "' >Editar</a></td>
                    <td> <a href='deletarCurso.php?id=" . $curso["idCurso"] . "' onClick='return confirmarAcao()'>Deletar</a></td>
                </tr>";
            }

        echo "</table>"
    ?>

   
</body>
</html>