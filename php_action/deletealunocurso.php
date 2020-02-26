<?php
// Sessão
session_start();
// Conexão
require_once 'db.php';



if (isset($_POST['btn-deletar'])) {
    
    $idaluno = mysqli_escape_string($connect, $_POST['idaluno']);
    $idcurso = mysqli_escape_string($connect, $_POST['idcurso']);

    $sql = "DELETE FROM aluno_curso WHERE id_aluno = '$idaluno' AND id_curso = '$idcurso' ";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Aluno excluído do curso com sucesso";
        header("Location: ".$_SERVER['HTTP_REFERER']);
   }else {
        die(mysqli_error($connect));
        $_SESSION['mensagem'] = "Erro ao excluir aluno do curso";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

?>