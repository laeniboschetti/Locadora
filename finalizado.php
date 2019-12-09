<?php
 require_once("conexao.php");
 require_once("topo.php");

 session_start();
    if(!isset($_SESSION["user"]))         
       header("location: login.php");

         if(isset($_POST["idfilme"]))
                  {                                           
                    $formapagamento = $_POST["formapagamento"];
                    $usuario = $_SESSION["user"];
                    $idfilme = $_POST["idfilme"];                    
                    $datadisponibilidade = date('Y-m-d', strtotime("+3 days", strtotime("now")));
            
                    $Inserir = "INSERT INTO locacao ";
                    $Inserir .= "(CodigoFilme, CodigoUsuario, CodigoFormaPagamento, DataLocacao, DataDisponivel) ";
                    $Inserir .= "values($idfilme, $usuario, $formapagamento, now(), '$datadisponibilidade')"; 
                          
            // die($Inserir);
                    $Resultado = mysqli_query($conecta, $Inserir);

                    if(!$Resultado)
                      {
                          die("Falha ao gravar dados");
                      }
                    else                        
                    ?>
                      <div id="locacao_finalizada">
                       <div class="alert alert-success" role="alert">Seu filme já está disponível para assistir, aproveite!</div>
                      </div>
                  <?php 
                   }
                    else
                        header("location: filmes.php");
         
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

</body>

</html>
