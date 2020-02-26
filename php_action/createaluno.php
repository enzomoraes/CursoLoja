<?php
// Sessão
session_start();
// Conexão
require_once 'db.php';



if (isset($_POST['btn-cadastrar'])) {
    
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $sexo = mysqli_escape_string($connect, $_POST['grp1']);
    $dataNascimento = mysqli_escape_string($connect, $_POST['data-nascimento']);
    $indicacao = mysqli_escape_string($connect, $_POST['indicacao']);

    $sql = "INSERT INTO alunos (nome, sobrenome, telefone, endereco, cpf, sexo, dataNascimento, indicacao) VALUES 
    ('$nome', '$sobrenome', '$telefone', '$endereco', '$cpf', '$sexo', '$dataNascimento', '$indicacao')";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: ../alunos.php');
   }else {
        die(mysqli_error($connect));
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../alunos.php');
    }
}

?>