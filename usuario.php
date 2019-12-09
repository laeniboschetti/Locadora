<?php
 require_once("conexao.php");
 require_once("topo.php");
?>
<!doctype html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
      
       <style type="text/css" media="all">
           body{ font-family:Arial }
           .erro{color:#ED1C24; margin:0}
           .ok{color:#006633; margin:0}	
      </style>
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="_css/estilo.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
     <script type="text/javascript">
         
    $(document).ready(function() {
        $("p").hide();
        $('#verificar-email').click(function(){
            //desabilitando o submit do form
            $("form").submit(function () { return false; });
            //atribuindo o valor do campo
            var sEmail	= $("#email").val();
            // filtros
            var emailFilter=/^.+@.+\..{2,}$/;
            var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
            // condição
            if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
                $("p").show().removeClass("ok").addClass("erro")
                .text('Por favor, informe um email válido.');
            }else{
                $("p").show().addClass("ok")
                .text('Email informado está correto!');
            }
        });
        $('#email').focus(function(){
            $("p.erro").hide();
        });
   });	 
      </script>
           
  </head>
<body>               
    <?php if(isset($_POST["nome"]))
                {
                   $nome  = $_POST["nome"];
                   $email = $_POST["email"];
                   $senha = $_POST["senha"];

                    $inserir = "INSERT INTO usuarios ";
                    $inserir .="(Nome, Email, Senha) ";
                    $inserir .= "VALUES ('$nome', '$email', '$senha')";

                    $resultado = mysqli_query($conecta, $inserir);

                     if(!$resultado)
                     {
                         die("Erro na conexão");
                     }
                       
                }
             ?>
    
<div class="container">
    <div class="row">        
            <form action="usuario.php" id="form" method="post">
                  <h2>Cadastro de Usuário</h2>
            
                <div class="form-group col-md-10">  
                  <input class="form-control" type ="text" name="nome" placeholder ="Nome Completo"> 
                </div>
               
                <div class="form-group col-md-10">  
                  <input class="form-control" type ="text" name="email" id="email" placeholder ="E-mail">
                </div>
               
                <div class="form-group col-md-10">  
                  <input class="form-control" type ="password" name="senha" placeholder ="Senha">
                </div>
               
                <div class="form-group col-md-10">  
                  <button class="btn btn-primary" type = submit value = "inserir" id="verificar-email">Inserir</button>
                </div>
                 
            </form>
        <p></p>
     </div>
</div>
       

</body>

</html>