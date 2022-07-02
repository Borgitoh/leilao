<?php
session_start();
include 'validasessao.php';
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
     <link rel="stylesheet" href="../css/style.css">
     <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
 
    <!-- incio do nav bar -->
 <nav class="navbar navbar-expand-lg navbar-dark top-bar-container">
  <a class="navbar-brand" href="#"> <?php echo $_SESSION['nome']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
     <li class="nav-item">
        <a class=" text-white nav-link" href="../index.php">Incio</a>
      </li>
      <?php   if($_SESSION['idTipoUsario'] !=2 ){?>
      <li class="nav-item dropdown">
        <a class=" text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Funcionario
        </a>
        <div class="top-bar-container dropdown-menu " aria-labelledby="navbarDropdown">
          <a class=" text-white dropdown-item" href="CriarConta.php">Cadastrar</a>
          <a class="text-white dropdown-item" href="ListarFuncionario.php">Listar</a>
        </div>
      </li>
      <?php  }?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Produto
        </a>
        <div class="top-bar-container  dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="text-white dropdown-item" href="CadastroProduto.php">Cadastrar</a>
          <a class="text-white dropdown-item" href="ListarProduto.php">Listar</a>
        </div>
      </li>
       <li class="nav-item">
        <a class=" text-white nav-link" href="../resultado.php">Resultado</a>
      </li>
      <li class="nav-item">
        <a class="text-white nav-link" href="sair.php?sessao=sim">Sair</a>
      </li>
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
                  produto.dataFinal, produto.preco ,situacao.nome as situacao FROM produto 
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
                            <p class="card-text"><?php echo $row['nome']; ?></p>
                            <p class="card-text"> Preço: <?php echo $row['preco']; ?></p>
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


<script src="../js/Jquery.js" ></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/popover.js"></script>
<!-- foooter -->

<footer class="text-muted">
  <div class="container">
  <div  class="float-right" id="scrollToTop"><span>Go Up</span></div>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/4.6/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>

<script src="../Js/scroll.js" crossorigin="anonymous"></script>
</body>
</html>
