<?php
session_start();
include "conexao.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leilao</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body>

    <!-- incio do nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark  top-bar-container">
        <a class="navbar-brand" href="leilao.php">Leilão</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class=" nav-item">
                    <a class="text-white nav-link">Incio</a>
                </li>
                <li class=" nav-item">
                    <a class=" text-white nav-link">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link">Resultado</a>
                </li>
                <?php   if( empty($_SESSION['idTipoUsario'])){?>
                <li class="  nav-item">
                    <a class="  text-white nav-link" href="login.php">Login</a>
                </li>
                <?php }?>
                <?php   if(!empty($_SESSION['idTipoUsario'])){?>
                <li class="nav-item">
                    <a class=" text-white nav-link" href="php/sair.php">Sair</a>
                </li>
                <?php }?>
            </ul>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Procurar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
            </form>
        </div>
    </nav>
    <!-- fim  do nav bar  -->

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php
     
                  $mysqli= "SELECT produto.nome, produto.imagem, produto.descricao, produto.dataInicial , 
                  produto.dataFinal ,situacao.nome as situacao FROM produto 
                  INNER JOIN situacao ON produto.situacao = situacao.idSituacao ORDER by 1 DESC ";
                  $resultado=mysqli_query($con,$mysqli);
                  while($row=mysqli_fetch_assoc($resultado)){
                ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <!-- <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                            src=" <?php echo $row['imagem'] ?>" > -->
                            <img  class="bd-placeholder-img card-img-top" 
                            width="100%" height="225"src=" <?php echo $row['imagem']; ?>" />
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['descricao']; ?></p>
                            <p class="card-text"> Data Inicio: <?php echo $row['dataInicial']; ?></p>
                            <p class="card-text">Data Final :<?php echo $row['dataFinal']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Participar</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
     
                  }?>
            </div>
        </div>
    </div>


    <!-- foooter -->

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                    href="/docs/4.6/getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>


</body>

</html>