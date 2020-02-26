<?php
// Sessão
session_start();
// Conexão Banco de dados
include_once 'php_action/db.php';
// Header
include_once 'includes/header.php';
?>
<?php
if (!isset($_SESSION['logado'])) {
    header('Location: index.php');
}
if (!isset($_GET['id'])) {
    header('Location: cursos.php');
}
?>
    <p>
        Olá <?php echo ucfirst($_SESSION['nome-usuario']) ; ?>
        <a href="logout.php">Sair</a>
    </p>
       


<div class="row">
    <div class="col s12 m6 push-m3">
    <div class="col s12 m6 push-m3">
        <a href="aluno-curso.php?<?php echo $_SERVER['QUERY_STRING']; ?>" class="btn-floating"><i class="material-icons">arrow_back</i></a>
        <a href="home.php" class="btn-floating"><i class="material-icons">home</i></a>
    </div>
    
    
        <h1 class="light"><?php echo ucfirst($_GET['descricao'])." de ". ucfirst($_GET['culinarista']). " dia ".$_GET['data']  ;?> </h1>

        <table class="striped"> 
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Sobrenome:</th>
                    <th>Telefone:</th>
                    <th>Endereço:</th>
                    <th>CPF:</th>
                    <th>Data de Nascimento:</th>
                    <th>Indicação:</th>

                </tr>  
            </thead>
            <tbody>
                <?php
                $id = $_GET['id'];
                $sql = "SELECT A.* FROM aluno_curso AC JOIN alunos A on (A.id = AC.id_aluno) JOIN cursos C on (AC.id_curso = C.id) WHERE C.id = '$id' ORDER BY A.nome";
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) > 0){

                

                while($dados = mysqli_fetch_array($resultado)):
                    
                ?>

                <tr>
                        <td><?php echo ucfirst($dados['nome']); ?></td>
                        <td><?php echo ucfirst($dados['sobrenome']); ?></td>
                        <td><?php echo ucfirst($dados['telefone']); ?></td>
                        <td><?php echo ucfirst($dados['endereco']);?></td>
                        <td><?php echo $dados['cpf']; ?></td>
                        <td><?php echo $dados['dataNascimento']; ?></td>
                        <td><?php echo ucfirst($dados['indicacao']);?></td>

                </tr>
                <?php
                endwhile;
                
                }else { ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                <?php    
                }
                ?>

            </tbody>
        </table>
    <br>
<script>
    document.window.onload=print();
</script>
<?php
include_once 'includes/footer.php';
?>
