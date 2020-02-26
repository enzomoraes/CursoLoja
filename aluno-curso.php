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
        <a href="<?php $_SERVER['HTTP_REFERER']; ?>" class="btn-floating"><i class="material-icons">arrow_back</i></a>
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
                        <td><?php echo date("d/m/Y" ,strtotime($dados['dataNascimento'])); ?></td>
                        <td><?php echo ucfirst($dados['indicacao']);?></td>

                        <td>Remover Aluno Deste Curso        <a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                    

                    <!-- Modal Structure -->
                    <div id="modal<?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                        <h4>Opa!</h4>
                        <p>Tem certeza que deseja excluir esse aluno do curso?</p>
                        </div>
                        <div class="modal-footer">
                        <form action="php_action/deletealunocurso.php" method="POST">
                            <input type="hidden" name="idaluno" value="<?php echo $dados['id']; ?>">
                            <input type="hidden" name="idcurso" value="<?php echo $_GET['id']; ?>">
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
    <a class="waves-effect waves-light btn modal-trigger" href="#modaladiciona">Adicionar Aluno no Curso</a>
    <a href="imprimir-alunos-curso.php?id=<?php echo $_GET['id'];?>&descricao=<?php echo $_GET['descricao'];?>&culinarista=<?php echo $_GET['culinarista'];?>&data=<?php echo $_GET['data'];?>" class="btn-floating blue"><i class="material-icons">print</i></a>
    
    
        <!-- Modal Structure -->
            <div id="modaladiciona" class="modal">
            <div class="modal-content">
                <h4>Selecione o Aluno</h4>
                <p>
                    <?php 
                   
                    $sql = "SELECT * FROM alunos";
                    $resultado = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($resultado) > 0 ) {
                    ?>
                        <table>
                        <thead>
                            <tr>
                                <th>Nome:</th>
                                <th>Sobrenome:</th>
                                <th>CPF:</th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>    
                    <?php
                        while($dados = mysqli_fetch_array($resultado)){
                            

                    ?>
                        
                            
                                <tr>
                                    <td><?php echo ucfirst($dados['nome']); ?></td>
                                    <td><?php echo ucfirst($dados['sobrenome']); ?></td>
                                    <td><?php echo $dados['cpf']; ?></td>
                                    <form action="php_action/createalunocurso.php" method="post">
                                        <input type="hidden" name="idaluno" value="<?php echo $dados['id'];?>">
                                        <input type="hidden" name="idcurso" value="<?php echo $_GET['id'];?>">
                                        <td>Adicionar Aluno No Curso       <button type="submit" name="btn-adicionar" class="btn-floating green modal-trigger modal-close"><i class="material-icons">add</i></button></td>
                                    </form>
                                </tr>
                            
                            
                        <?php    
                        }
                        ?>
                            </tbody>    
                        </table>
                    <?php
                    }
                    ?>
                </p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
            </div>
        </div>
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