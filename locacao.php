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
    <title>Locação</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="_css/estilo.css">

</head>

<body>  
    
    <div class="container">
        <div class="row">
            <div class="filme_locacao">
                <form action="finalizado.php" method="post">
                    <h2>Locação</h2>

                       <?php         

                        if(isset($_GET["idfilme"]))
                             {
                                $idfilme = isset($_GET["idfilme"]) ? $_GET["idfilme"] : $_POST["idfilme"];

                                $consultafilme = "SELECT f.Titulo as titulo, f.Valor as valor, ";
                                $consultafilme .= "f.ImagemPequena as imagem, g.Descricao as descricao ";
                                $consultafilme .= "FROM filmes f ";
                                $consultafilme .= "LEFT OUTER JOIN generos g ";
                                $consultafilme .= "ON (f.Genero = g.Id) ";
                                $consultafilme .= "WHERE f.Id = {$idfilme} ";

                                //die($consultafilme);
                                $resultadofilme = mysqli_query($conecta, $consultafilme);

                                if(!$resultadofilme)
                                    {
                                        die("Erro na conexão");
                                    }

                                $informacaofilme = mysqli_fetch_assoc($resultadofilme);
                            }
                         /* else
                             header("location: filmes.php");*/

                            ?>
                    
                    <div id="listagem_filme_locacao">
                        <ul>
                            <li><img src="<?php echo $informacaofilme["imagem"]; ?>"></li>
                            <div id="titulo_filme_locacao">
                                <li><?php echo utf8_encode($informacaofilme["titulo"]) ?></li>
                            </div>
                            <div id="valor_filme_locacao">
                                <li>Valor: R$ <?php echo number_format($informacaofilme["valor"], 2, ",","."); ?></li>
                            </div>
                        </ul>
                    </div>

                    
                    <label class="formapagamento">Escolha a forma de pagamento:</label>
                    
                    <div id="formapagamento">
                        <div class="form-group col-md-2">
                            <?php
                            $consultaformapagamento = "SELECT * FROM ";
                            $consultaformapagamento .="formapagamento ";

                            $resultado = mysqli_query($conecta, $consultaformapagamento);

                            if(!$resultado)
                            {
                            die("Erro na conexão");
                            }

                            ?>                        
                            <select id="formapagamento" name="formapagamento" class="form-control">
                                <?php 
                                 while($informacao = mysqli_fetch_assoc($resultado))
                                  {
                                ?>
                                <option value="<?php echo $informacao["Id"]?>"><?php echo utf8_encode($informacao["Descricao"])?></option>
                                <?php 
                                  }?>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="idfilme" value="<?php echo $_GET["idfilme"] ?>">
                    
                    <label class="valor_total_locacao">Total a Pagar: <?php echo number_format($informacaofilme["valor"], 2, ",",".");?></label>

                    <div id="gravar_locacao" class="form-group col-md-10">
                        <button class="btn btn-primary" type="submit" value="inserir">Finalizar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


</body>

</html>
