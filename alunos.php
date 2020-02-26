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
?>
    <p>
        Olá <?php echo ucfirst($_SESSION['nome-usuario']) ; ?>
        <a href="logout.php">Sair</a>
    </p>
       


<div class="row">
    <div class="col s12 m6 push-m3">
    <div class="col s12 m6 push-m3">
        <a href="home.php" class="btn-floating"><i class="material-icons">home</i></a>
    </div>
        <h1 class="light"> Alunos Cadastrados </h1>

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
                $sql = "SELECT * FROM alunos ORDER BY nome";
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
                        <td><?php echo date("d/m/Y" ,strtotime($dados['dataNascimento'])); ?></td>
                        <td><?php echo ucfirst($dados['indicacao']);?></td>

                        <td>Editar Aluno        <a href="editaraluno.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        <td>Remover Aluno        <a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                    

                    <!-- Modal Structure -->
                    <div id="modal<?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                        <h4>Opa!</h4>
                        <p>Tem certeza que deseja excluir esse curso?</p>
                        </div>
                        <div class="modal-footer">
                        <form action="php_action/deletealuno.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                            <button type="submit" name="btn-deletar" class="btn red">Sim! Quero excluir</button>
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                        </div>
                    </div>
                </tr>
                <?php
                endwhile;
                }else { ?>
                    <tr>
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
    <a href="adicionaraluno.php" class="btn">Adicionar Aluno</a>

    </div>
</div>

<?php
if (!empty( $_SESSION['mensagem'])) { // Imprime mensagem de erro com 'toasts' do javascript
    $mensagem[] = $_SESSION['mensagem'];
    foreach ($mensagem as $msg) {
           
        echo "<script>
        window.onload = function(){
            M.toast({html: '$msg'})
        }
        </script>";
    }
    $_SESSION['mensagem'] = null;
}
?>

<?php
include_once 'includes/footer.php';
?>