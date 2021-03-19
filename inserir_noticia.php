<?php
    $conexao = mysqli_connect('localhost','root','','noticias');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Portal de noticias
    </title>
</head>
    <?php
        if (isset($_POST['usuario'])){
            $query = "SELECT * FROM usuarios WHERE usuario = '" . $_POST['usuario'] . "' and senha = '" . $_POST['usuario'] . "'";
            $resultado = mysqli_query($conexao, $query);
        
            if(mysqli_num_row($resultado) == 1){
                $_SESSION['usuario'] = $_POST['usuario'];
            }else{
                echo "login invalido";
            }
        }elseif(isset($_POST['titulo'])){

            $query = "INSERT INTO noticias (titulo, texto) VALUES ('" . $_POST['titulo'] . "', '" . $_POST['texto'] . "'";

            if(mysqli_query($conexao, $query)){
                echo "Noticia inserida";
            }else{
                echo "erro!";
            }
        }
    ?>
   
   <body>
        <?php if(isset($_SESSION['usuario'])) { ?>
        <h2>Insira sua noticia</h2>
        <br>
            <form method = "post" action="inserir_noticia.php">
                <input type="text" name = "titulo"></input>
                <input type="text" name = "titulo"></input>
                <button type="submit">Enviar Noticias</button>
            </form>
            <a href ="sair.php">Sair</a>
            <?php }else { ?>
            <h2>Efetuar login</h2>
            <br>
                <form method = "post" action="inserir_noticia.php">
                <input type="text" name = "usuario"></input>
                <input type="text" name = "senha"></input>
                <button type="submit">Efetuar Login</button>
            </form>
            } 
        
   </body>
</html>