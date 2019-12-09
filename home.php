<!doctype html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="_css/estilo.css">
  </head>

  <body>
    <div class="container"> 
        <div id="slide-home">
        <div class="carousel slide" data-ride="carousel" id="galeria">
            
           <ol class="carousel-indicators">
                <li data-target="#galeria" data-slide-to="0" class="active"></li>
                <li data-target="#galeria" data-slide-to="1"></li>
                <li data-target="#galeria" data-slide-to="2"></li>
           </ol>
            
            <div class="carousel-inner">
                <div class="item active">
                     <img src="../Locadora/imagens/deadpool2.jpg" class="img-responsive">
                </div>
                <div class="item">
                     <img src="../Locadora/imagens/coringa.jpg" class="img-responsive">
                </div>   
                 <div class="item">
                     <img src="../Locadora/imagens/reileao.jpg" class="img-responsive">
                </div>
            </div> 
                        
            <a class="left carousel-control" href="#galeria" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            
            <a class="right carousel-control" href="#galeria" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            
        </div>
       </div>
  </div>
  
      <script src="../Locadora/js/jquery.js"></script>
      <script src="../Locadora/js/bootstrap.min.js"></script>
      <script src="../Locadora/js/script.js"></script>
  </body>

</html>