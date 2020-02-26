<?php
// Sessão
session_start();
// Conexão
require_once 'db.php';

if (isset($_POST['btn-editar'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $dataNascimento = mysqli_escape_string($connect, $_POST['data-nascimento']);
    $indicacao = mysqli_escape_string($connect, $_POST['indicacao']);
    $sexo = mysqli_escape_string($connect, $_POST['grp1']);
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE alunos SET nome = '$nome', sobrenome = '$sobrenome', telefone = '$telefone',
    endereco = '$endereco', cpf = '$cpf', dataNascimento = '$dataNascimento',
    indicacao = '$indicacao', sexo = '$sexo' WHERE id = '$id'";
    
    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Aluno Atualizado com sucesso";
        header('Location: ../alunos.php');
        
   }else {
       die(mysqli_error($connect));
        $_SESSION['mensagem'] = "Erro ao atualizar Aluno";
        header('Location: ../alunos.php');
        echo "hey";
    }
}

?>