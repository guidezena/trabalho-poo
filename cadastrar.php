<?php
require_once 'Classes/usuarios.php';
$u = new conexaoBanco;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>

<body>
    <div id="corpo-form-cad">
        <h1>Cadastrar Usuario</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuario" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar senha">
            <input href="index.php" id="submit" type="submit" value="Cadastrar">
        </form>
    </div>

    <?php
    //verificar se clicou
    if (isset($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);
        //verificar se nao ta
        if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
            $u->conectar("projeto_login", "localhost", "root", "");
            if ($u->msgErro == "") //se esta tudo okay
            {
                if ($senha == $confirmarSenha) {
                    if ($u->cadastrar($nome, $telefone, $email, $senha,)) {
                        ?>
                        <div id="msg-sucesso">cadastrado com sucesso! Acesse para entrar</div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="msg-erro">Email ja cadastrado</div>
                    <?php
                }
            } else {
                ?>
                <div class="msg-erro">senha e confirmar senha nao correspondem"</div>
                <?php
               
            }
        } else {
            echo "Erro: " . $u->msgErro;
        }
    } else {
        ?>
        <div class="msg-erro">Preencha todos os campos</div>
        <?php
         
         
    }


    ?>
</body>

</html>