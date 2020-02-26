<?php
// Sessão
session_start();
// Conexão
require_once 'db.php';



if (isset($_POST['btn-cadastrar'])) {
    
    $culinarista = mysqli_escape_string($connect, $_POST['culinarista']);
    $data = mysqli_escape_string($connect, $_POST['data']);
    $descricao = mysqli_escape_string($connect, $_POST['descricao']);
    $particular = mysqli_escape_string($connect, $_POST['grp1']);
    $preco = mysqli_escape_string($connect, $_POST['preco']);
    
    $sql = "INSERT INTO cursos (culinarista, data, descricao, particular, preco) VALUES 
    ('$culinarista', '$data', '$descricao', '$particular', '$preco')";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: ../cursos.php');
   }else {
        die(mysqli_error($connect));
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../cursos.php');
    }
}

?>