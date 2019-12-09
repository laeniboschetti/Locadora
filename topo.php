<!doctype html>
<html lang="pt-BR">
    <?php session_start();?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php if(!isset($_SESSION["user"])){?>
                <a class="navbar-brand" href="index.php">Locadora</a>
                 <?php } ?>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="filmes.php">Filmes</a></li>
                    <li><a href="generos.php">Gêneros</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <?php if(!isset($_SESSION["user"])){?>
                            <li><a href="usuario.php">Cadastre-se</a></li>                            
                            <li><a href="login.php">Fazer Login</a></li>                            
                            <?php } ?>
                            <?php if(isset($_SESSION["user"])){?>
                            <li><a href="meusfilmes.php">Meus Filmes</a></li>                            
                            <li><a href="logout.php">Sair</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>