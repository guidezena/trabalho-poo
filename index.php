<?php
    require_once 'Classes/usuarios.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>

<body>
    <div id="corpo-form">
        <h1>Cadastre</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="Usuario">
            <input type="password" name="senha" placeholder="Senha">
            <input  id="submit" type="button" value="Acessar">
            <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se aqui</strong></a>
        </form>
    </div>
    <?php
    if (isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        //verificar se nao ta
        if (!empty($email) && !empty($senha))
        {
            $u->conectar("projeto_login",'localhost','root',"");
            if($u->msgErro == "")
            {
                if($u->logar($email, $senha))
                {
                    header("location:AreaPrivada.php");
                }                
                    else
                    {
                        echo "email ou senha incorreto";
                    }
                
                return true;
            }
            else
            {
                echo "Error: ". $u->msgErro;
            }
        }
        else
        {
            echo "Preencha todos os campos";
        }
    }
    ?>
</body>

</html>