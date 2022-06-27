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
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>">
     
<body>
 
    <!-- incio do nav bar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> <?php echo $_SESSION['nome']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
     <li class="nav-item">
        <a class="nav-link" href="admin.php">Incio</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Funcionario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="CriarConta.php">Cadastrar</a>
          <a class="dropdown-item" href="#">Listar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Produto
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Cadastrar</a>
          <a class="dropdown-item" href="#">Listar</a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../resultado.php">Resultado</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sair.php?sessao=sim">Sair</a>
      </li>
    </ul>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Procurar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
    </form>
  </div>
</nav> 

<!-- tabela dos funcionario-->
<div class="container-fluid mt-5">
    <div class="container mt-5">
    <table class="table table-striped"  id="example2" >
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Acçoes</th>
                    </tr>
                </thead>
  <tbody>
    <?php
      $id = $_SESSION['idusuario'];
      $mysqli= "SELECT usuario.nome, usuario.email, tipousuario.nome as tipousuario  
        FROM `usuario` INNER JOIN tipousuario 
        ON usuario.IdTipoUsuario = tipousuario.IdTipoUsuario
         WHERE Idusario != '$id'ORDER by 1 desc ";
     $resultado=mysqli_query($con,$mysqli);
     while($row=mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
      <th scope="row"> <?php echo $row['nome']; ?></th>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['tipousuario']; ?></td>
      <td><button type="button" class="btn btn-danger">Inativar</button></td>
    </tr>
    <?php
     }
    ?>
  </tbody>
 </table>

 
    </div>
</div>

<!-- Fim da Tablea do Funcionario -->
<script src="../js/Jquery.js" ></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/popover.js"></script>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
<script>
$(document).ready(function () {
    $('#example2').DataTable();
});
</script>

<!-- foooter -->

<footer class="text-muted mt-5">
  <div class="container mt-5">
  <div  class="float-right" id="scrollToTop"><span>Go Up</span></div>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/4.6/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>

<script src="../Js/scroll.js" crossorigin="anonymous"></script>
</body>
</html>
