<?php
    $conexao = mysqli_connect('localhost','root','','noticias');
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Portal de noticias
    </title>
</head>
   <body>
        <?php
            $sql = "select * from noticias";
            $resultados = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultados)>0){
                while($linha = mysqli_fetch_assoc($resultados)){
                    echo $linha["titulo"];
                    echo "<br>";
                    echo $linha["texto"];
                    echo "<br><br>";
                }                
            }else{
                echo "Não encontrou nenhuma noticia";
            }
        ?>
        <a href = "inserir_noticia.php">Inserir Noticia</a>
   </body>
</html>