<?php
// Sessão
session_start();
// Conexão
require_once 'db.php';



if (isset($_POST['btn-deletar'])) {
    
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    $sql = "DELETE FROM alunos WHERE ID = '$id'";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Aluno excluído com sucesso";
        header('Location: ../alunos.php');
   }else {
        die(mysqli_error($connect));
        $_SESSION['mensagem'] = "Erro ao excluir";
        header('Location: ../alunos.php');
    }
}

?>