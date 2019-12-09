    <?php

    $servidor = "127.0.0.1";
    $usuario  = "root";
    $senha    = "123456";
    $banco    = "locadora";

    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

    if(mysqli_connect_errno())
        {
           die("Conexão falhou: " . mysqli_connect_errno());
        
             mysqli_close($conecta);
        }
              
    ?>


