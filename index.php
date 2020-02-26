<?php
// Sessão
session_start();
session_unset(); // Para caso a pessoa volte à pagina anterior logo após fazer o login ela é desconectada
// Conexão Banco de dados
include_once 'php_action/db.php';
// Header
include_once 'includes/header.php';
?>

<?php
    if (isset($_POST['btn-login'])) {

        $erros = array(); // Array para mensagem de erros
        $login = mysqli_escape_string($connect, $_POST['login']); // Dados inseridos
        $senha = mysqli_escape_string($connect, $_POST['senha']); // Dados inseridos

        if (empty($login) || empty($senha)) {

            $erros [] = "<li>Os campos login/senha devem ser preenchidos</li>";

        }else { 

            $sql = "SELECT login FROM usuarios WHERE login = '$login'";
            $resultado = mysqli_query($connect, $sql) or die(mysqli_error($connect));
            
            if (mysqli_num_rows($resultado) > 0) { // Verificando se há registros no banco

                $senha = md5($senha);
                $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
                $resultado = mysqli_query($connect,$sql);

                if (mysqli_num_rows($resultado) == 1) { // Verificando se usuário e senha conferem

                    $dados = mysqli_fetch_array($resultado);
                    mysqli_close($connect);
                    $_SESSION['logado'] = true;
                    $_SESSION['id-usuario'] = $dados['id'];
                    $_SESSION['nome-usuario'] = $dados['nome'];
                    header('Location: home.php');

                }else {

                    $erros [] = "<li>Usuário e senha não conferem</li>";

                }
            }else {

                $erros [] = "<li>Usuario inexistente</li>";
                
            }
        }
    }
    mysqli_close($connect);
?>
<?php
if (!empty($erros)) { // Imprime mensagem de erro com 'toasts' do javascript
    foreach ($erros as $erro) {
        echo "<script>
        window.onload = function(){
            M.toast({html: '$erro'})
        }
        </script>";
    }
}
?>
<div class="row">
    <div class="col 12 m6 push-m3">
        <h1 class="light"> Login </h1>
        <!-- <img class="circle responsive-img" src="images/morenadoces.jpg" alt="imagem"> -->
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-field col s12">
                <input type="text" name="login" id="login">
                <label for="login">Login: </label>
            </div>
            <div class="input-field col s12">
                <input type="password" name="senha" id="senha">
                <label  for="senha">Senha: </label>
            </div>
            <div>
                <button type="submit" class="btn blue" name="btn-login" >Login</button>
            </div>
        </form>
    </div>
</div>


<?php
// Footer
include_once 'includes/footer.php';
?>