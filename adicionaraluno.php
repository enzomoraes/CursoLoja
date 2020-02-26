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
        <a href="alunos.php" class="btn-floating"><i class="material-icons">arrow_back</i></a>
        <a href="home.php" class="btn-floating"><i class="material-icons">home</i></a>
    </div>
        <h1 class="light"> Adicionar Aluno </h1>

                <form action="php_action/createaluno.php" class="col s12" method="POST">

                    <div class="input-field ">
                        <label for="nome" data-error="wrong" data-success="right">Nome: </label>
                        <input class="validate" type="text" name="nome" id="nome" required >
                    </div>

                    <div class="input-field ">
                        <label  for="sobrenome" data-error="wrong" data-success="right">Sobrenome: </label>
                        <input class="validate" type="text" name="sobrenome" id="sobrenome" required>
                    </div>
                    
                    <div class="input-field ">
                        <label for="telefone" data-error="wrong" data-success="right">Telefone: </label>
                        <input value="679" class="validate" type="text" name="telefone" id="telefone" pattern="^[0-9]{2}[9][0-9]{8}$" required>
                    </div>

                    <div class="input-field ">
                        <label for="endereco" data-error="wrong" data-success="right">Endereço: </label>
                        <input class="validate" type="text" name="endereco" id="endereco" required>
                    </div>

                    <div class="input-field ">
                        <label for="cpf" data-error="wrong" data-success="right">CPF: </label>
                        <input value="" class="validate" type="text" name="cpf" id="cpf" pattern="^[0-9]{3}[0-9]{3}[0-9]{3}[0-9]{2}$" required>
                    </div>

                    <div class="input-field ">
                        
                        <input type="date" name="data-nascimento" id="data-nascimento" required>
                        <label for="data-nascimento">Data de Nascimento</label>
                        
                    </div>

                    <div class="input-field ">
                        <label for="indicacao" data-error="wrong" data-success="right">Indicação: </label>
                        <input class="validate" type="text" name="indicacao" id="indicacao" maxlength="30">
                    </div>

                    <div class="radio input-field col s12">
                        <span>Sexo</span>
                        <p>
                            <label for="choice1">
                            <input value="M" class="with-gap" type="radio" name="grp1" id="choice1" required >
                            <span>Masculino</span>
                            </label>
                        </p>
                        <p>
                            <label for="choice2">
                            <input value="F" class="with-gap" type="radio" name="grp1" id="choice2"> 
                            <span>Feminino</span>
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