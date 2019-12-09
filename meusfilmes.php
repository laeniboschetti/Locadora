<?php
 require_once("conexao.php");
 require_once("topo.php");

 session_start();
    if(!isset($_SESSION["user"]))         
       header("location: login.php");
         
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Meus Filmes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="_css/estilo.css">

</head>

<body>

    <div class="container">
        <div class="row">
            <h2>Meus Filmes</h2>
            <div id="filmes_genero">
                <?php         
         
                                 $consultagenero = "SELECT DISTINCT(Genero), g.Descricao as descricao FROM generos g ";
                                 $consultagenero .= "LEFT OUTER JOIN filmes f ";
                                 $consultagenero .= "ON (f.Genero = g.Id) ";
                                 $consultagenero .= "LEFT OUTER JOIN locacao l ";
                                 $consultagenero .= "ON (l.CodigoFilme = f.Id) ";
                                 $consultagenero .= "LEFT OUTER JOIN usuarios u ";
                                 $consultagenero .= "ON (l.CodigoUsuario = u.Id) ";                                                       
                                 $consultagenero .= "WHERE l.CodigoUsuario = {$_SESSION["user"]} ";
                 
                                // die($consultagenero);
                                     
                                 $resultado = mysqli_query($conecta, $consultagenero);
                 
                 
                                if(!$resultado)
                                    {
                                        die("Erro na conexão");
                                    }
                                              
                     
                               // $informacaogenero = mysqli_fetch_assoc($resultado);
                                                                       
                                
                            while($informacaogenero = mysqli_fetch_assoc($resultado))
                                    { ?>
                <label class="genero_filme"><?php echo utf8_encode($informacaogenero["descricao"]) ?></label>

                <?php
                                    $consultafilme = "SELECT f.Titulo as titulo, ";
                                    $consultafilme .= "f.ImagemPequena as imagem, g.Id as Id, l.DataLocacao as data, l.DataDisponivel as disponivel ";
                                    $consultafilme .= "FROM locacao l ";
                                    $consultafilme .= "LEFT OUTER JOIN filmes f ";
                                    $consultafilme .= "ON (f.Id = l.CodigoFilme) ";
                                    $consultafilme .= "LEFT OUTER JOIN generos g ";
                                    $consultafilme .= "ON (f.Genero = g.Id) ";
                                    $consultafilme .= "LEFT OUTER JOIN usuarios u ";
                                    $consultafilme .= "ON (u.Id = l.CodigoUsuario) ";
                                    $consultafilme .= "WHERE l.CodigoUsuario = {$_SESSION["user"]} ";
                                    $consultafilme .= "AND f.Genero = {$informacaogenero["Genero"]} ";

                                    //die($consultafilme);
                                    $resultadofilme = mysqli_query($conecta, $consultafilme);

                                    if(!$resultadofilme)
                                        {
                                            die("Erro na conexão");
                                        }
                 
                                    while($informacaofilme = mysqli_fetch_assoc($resultadofilme))
                                            {     
                                                $datalocacao = $informacaofilme["data"];                                                
                                                $disponivel = $informacaofilme["disponivel"];
                                                $datadisponivel = date('d/m/Y', strtotime($disponivel));
                                                $dataatual= date('d/m/Y');
                                                                                
                                            ?>
                <ul>
                    <li><img src="<?php echo $informacaofilme["imagem"]; ?>"></li>
                    <div id="titulo_filme">
                        <li><?php echo utf8_encode($informacaofilme["titulo"]) ?></li>
                    </div>
                    <li>Locado: <?php echo date('d/m/Y', strtotime($datalocacao))?></li>
                    <?php if($dataatual < $datadisponivel)
                                                          {?>
                    <li>Disponível até: <?php echo date('d/m/Y', strtotime($disponivel));?></li>                    
                        <li>
                            <?php }
                                  else {
                                       echo "Seu Filme não está mais disponível, alugue-o novamente.";
                                       }
                                ?>
                        </li>                   
                </ul>
                <?php
                                            }
                                }?>
            </div>
        </div>
    </div>

</body>

</html>