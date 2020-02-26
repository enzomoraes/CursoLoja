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
        <a href="cursos.php" class="btn-floating"><i class="material-icons">arrow_back</i></a>
        <a href="home.php" class="btn-floating"><i class="material-icons">home</i></a>
    </div>
        <h1 class="light"> Adicionar Curso </h1>

                <form action="php_action/createcurso.php" class="col s12" method="POST">
                    <div class="input-field ">
                        <label for="culinarista" data-error="wrong" data-success="right">Culinarista: </label>
                        <input class="validate" type="text" name="culinarista" id="culinarista" >
                    </div>
                    
                    <div class="input-field ">
                        <input type="date" name="data" id="data" required >
                        <label for="data">Data do Curso</label>

                    </div>

                    <div class="input-field ">
                        <label for="descricao" data-error="wrong" data-success="right">Descrição: </label>
                        <input class="validate" type="text" name="descricao" id="descricao">
                    </div>

                    <div class="input-field ">
                        <label for="preco" data-error="wrong" data-success="right">Preço: </label>
                        <input class="validate" type="number" name="preco" id="preco">
                    </div>

                    <div class="radio input-field col s12">
                        <span>Particular</span>
                        <p>
                            <label for="choice1">
                            <input value="1" class="with-gap" type="radio" name="grp1" id="choice1" required >
                            <span>Sim</span>
                            </label>
                        </p>
                        <p>
                            <label for="choice2">
                            <input value="0" class="with-gap" type="radio" name="grp1" id="choice2"> 
                            <span>Não</span>
                            </label>
                        </p>
                    </div>       
                    <button class="btn" type="submit" name="btn-cadastrar">Cadastrar</button>            
                </form>
    
    <br>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>