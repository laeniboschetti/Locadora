<?php

require_once("conexao.php");
require_once("topo.php"); 

    $consulta = "SELECT f.Titulo as Titulo, f.Valor as Valor, g.Descricao as Descricao, f.ImagemPequena as Imagem, f.Id as Id ";
    $consulta .= "FROM filmes f ";
    $consulta .= "LEFT OUTER JOIN generos g ";
    $consulta .= "ON (f.Genero = g.Id) ";

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
    <title>Filmes</title>
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
            <div id="listagem_filmes">
                <?php             
            while($linha = mysqli_fetch_assoc($lista_filmes))
                {
                    ?>
                <ul>
                    <li><img src="<?php echo $linha["Imagem"] ?>"></li>
                    <div id="titulo_filme">
                        <li><a href="filmedetalhe.php?idfilme=<?php echo $linha["Id"]?>"><?php echo utf8_encode($linha["Titulo"]) ?></a></li>
                    </div>
                    <li>Valor: R$ <?php echo number_format($linha["Valor"], 2, ",","."); ?></li>
                    <div id="locacao">
                        <li><button type="button" class="btn btn-danger"><a href="locacao.php?idfilme=<?php echo $linha["Id"]?>">Alugue agora</a></button></li>
                    </div>

                </ul>
                <?php 
                }
                     ?>
            </div>
        </div>
    </div>
</body>

</html