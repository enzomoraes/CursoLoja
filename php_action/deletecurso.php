<?php
// Sessão
session_start();
// Conexão
require_once 'db.php';



if (isset($_POST['btn-deletar'])) {
    
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    $sql = "DELETE FROM cursos WHERE ID = '$id'";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Curso excluído com sucesso";
        header('Location: ../cursos.php');
   }else {
        die(mysqli_error($connect));
        $_SESSION['mensagem'] = "Erro ao excluir";
        header('Location: ../cursos.php');
    }
}

?>