<?php
 require_once("conexao.php");
 require_once("topo.php");
?>
<!doctype html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="_css/estilo.css">

  </head>

<body>      
        <?php 
    
            session_start();         
            if(isset($_POST["email"]))
                {                   
                    $email = $_POST["email"];
                    $senha = $_POST["senha"];

                    $consulta = "SELECT * FROM ";
                    $consulta .="usuarios ";
                    $consulta .= "WHERE Email = '{$email}' AND Senha = '{$senha}'";
                                
                    $resultado = mysqli_query($conecta, $consulta);

                     if(!$resultado)
                     {
                         die("Erro na conexão");
                     }
                
                    $informacao = mysqli_fetch_assoc($resultado);

                    if(empty($informacao))
                       {
                          $mensagem = "Login sem sucesso.";
                       }
                    else
                       {                          
                         $_SESSION["user"] = $informacao["Id"];
                         header("location:filmes.php");                        
                       }
                       
                }
         ?>
    
<div class="container">
    <div class="row">
            <form action="login.php" method="post">
                <div id="titulologin">
                  <h2>Login</h2>
                </div>
                
            <div class="center">
                <div class="login">
                    <div id="icone_usuario">                  
                        <img src="imagens/icone_usuario.png">                  
                    </div>

                    <div id="icone_senha">                  
                        <img src="imagens/icon-password.png">                  
                    </div>

                    <div class="form-group col-md-12">  
                      <input class="form-control" type="text" name="email" placeholder ="E-mail">
                    </div>

                    <div class="form-group col-md-12">  
                      <input class="form-control" type="password" name="senha" placeholder ="Senha">
                    </div>
                </div>
               <div id="cadastro">
                Ainda não tem cadastro? <a href="usuario.php">clique aqui</a>
                </div>
                <div id="efetuarlogin">
                    <div class="form-group col-md-10">  
                       <button class="btn btn-primary" type="submit" value="inserir">Efetuar Login</button>
                    </div>
                </div>
            </div>
                 
            </form>
        
     </div>
</div>
       

</body>

</html>