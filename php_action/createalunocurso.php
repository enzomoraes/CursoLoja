<?php
// Sessão
session_start();
// Conexão
require_once 'db.php';



if (isset($_POST['btn-adicionar'])) {
    
    $idaluno = mysqli_escape_string($connect, $_POST['idaluno']);
    $idcurso = mysqli_escape_string($connect, $_POST['idcurso']);

    $sql = "INSERT INTO aluno_curso (id_aluno, id_curso) VALUES ('$idaluno', '$idcurso')";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Cadastrado no curso com sucesso";
        header("Location: ".$_SERVER['HTTP_REFERER']);
   }else {
        $_SESSION['mensagem'] = "Erro ao cadastrar aluno no curso";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

?>