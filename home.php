<?php
// Sessão
session_start();
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
        <div class="col s12 m6 push-m3" id="home">
            <span>Alunos    </span><a href="alunos.php" class="btn-floating blue"><i class="large material-icons">account_circle</i></a>
            <span>Cursos    </span><a href="cursos.php" class="btn-floating blue"><i class="large material-icons">event</i></a>

        </div>
    </div>

<?php
include_once 'includes/footer.php';
?>
       
