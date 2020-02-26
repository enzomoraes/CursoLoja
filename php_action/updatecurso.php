<?php
// Sessão
session_start();
// Conexão
require_once 'db.php';

if (isset($_POST['btn-editar'])) {
    $culinarista = mysqli_escape_string($connect, $_POST['culinarista']);
    $data = mysqli_escape_string($connect, $_POST['data']);
    $descricao = mysqli_escape_string($connect, $_POST['descricao']);
    $preco = mysqli_escape_string($connect, $_POST['preco']);
    $particular = mysqli_escape_string($connect, $_POST['grp1']);
    $id = mysqli_escape_string($connect, $_POST['id']);
    

    $sql = "UPDATE cursos SET culinarista = '$culinarista', data = '$data', descricao = '$descricao',
    preco = '$preco', particular = '$particular' WHERE id = '$id'";
    
    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Curso Atualizado com sucesso";
        header('Location: ../cursos.php');
        
   }else {
       die(mysqli_error($connect));
        $_SESSION['mensagem'] = "Erro ao atualizar Curso";
        header('Location: ../cursos.php');
        echo "hey";
    }
}

?>