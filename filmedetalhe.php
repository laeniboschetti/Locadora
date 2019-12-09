<?php

require_once("conexao.php");
require_once("topo.php"); 

$idfilme = $_GET["idfilme"];

    $consulta = "SELECT f.Titulo as Titulo, f.Resumo as Resumo, g.Descricao as Descricao, f.Imagem as Imagem, f.Id as Id ";
    $consulta .= "FROM filmes f ";
    $consulta .= "LEFT OUTER JOIN generos g ";
    $consulta .= "ON (f.Genero = g.Id) ";
    $consulta .= "WHERE f.Id = $idfilme";

    $filme = mysqli_query($conecta, $consulta);

        if(!$filme)
        {
             die("Erro na conexão");
        }
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Filmes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="_css/estilo.css">

</head>

<body>
    <div class="container">
        <div id="filme">
            <?php             
            while($linha = mysqli_fetch_assoc($filme))
                {
                    ?>
            <ul>                
                <li><img src="<?php echo $linha["Imagem"] ?>"></li>  
                <div id="titulo_filme">
                    <li><h3><?php echo utf8_encode($linha["Titulo"]) ?></h3></li>
                </div>
                <div id="resumofilme">
                    <li><?php echo utf8_encode($linha["Resumo"]) ?></li>
                </div>
                <div id="locacao">
                    <li><button type="button" class="btn btn-danger"><a href="locacao.php?idfilme=<?php echo $linha["Id"]?>">Alugue agora</a></button></li>
                </div>

            </ul>
            <?php 
                }
                     ?>
        </div>
    </div>
</body>

</html
