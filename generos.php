<?php

require_once("conexao.php");
require_once("topo.php"); 

    $consulta = "SELECT f.Titulo as Titulo, f.Valor as Valor, g.Descricao as Descricao, f.ImagemPequena as Imagem ";
    $consulta .= "FROM filmes f ";
    $consulta .= "LEFT OUTER JOIN generos g ";
    $consulta .= "ON (f.Genero = g.Id) ORDER BY f.Genero";

     if(isset($_GET["filme"]))
        {      
           $nome_filme= $_GET["filme"];
           $consulta .= "WHERE f.Titulo LIKE '%{$nome_filme}%' "; 

           echo $consulta;

        }

    $lista_filmes = mysqli_query($conecta, $consulta);

        if(!$lista_filmes)
        {
             die("Erro na conexão");
        }
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pesquisa por Gêneros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="_css/estilo.css">

</head>

<body>
    <div class="container">
        <div id="filmes">
            <div id="janela_pesquisa">
                <form action="filmes.php" method="get">
                    <input type="text" name="filme" placeholder="Pesquisa">
                    <input type="image" src="../Locadora/imagens/botao_search.png">
                </form>
            </div>
        </div>

        <div id="listagem_filmes_genero">
            <?php
            while($linha = mysqli_fetch_assoc($lista_filmes))
                {
                    ?>
            <label class="genero"><?php echo utf8_encode($linha["Descricao"]) ?></label>
            <ul>
                <li><img src="<?php echo $linha["Imagem"] ?>"></li>
                <div id="titulo_filme">
                    <li><?php echo utf8_encode($linha["Titulo"]) ?></li>
                </div>
                <li>Valor: R$ <?php echo number_format($linha["Valor"], 2, ",","."); ?></li>
                <li>
                <li><button type="button" class="btn btn-danger">Alugue agora</button></li>
            </ul>
            <?php 
                }
                     ?>
        </div>

    </div>
</body>

</html
