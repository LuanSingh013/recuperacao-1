<?php
     include_once("./class/Curso.php");
     $p = new Curso();
 
     $p->excluirCurso($_GET["id"]);
     echo "Curso excluído";
?>

<a href="./listarCurso.php">Voltar</a>