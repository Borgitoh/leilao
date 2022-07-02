<!doctype html>
<?php 
session_start();
include "conexao.php";
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <form class="form-signin text-center" action="validarLogin.php" method="post">
            <img class="mb-4" src="../img/bootstrap-solid.svg" alt="" width="72"
                height="72">
            <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>
            <label for="inputEmail" class="sr-only">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite seu Nome" required autofocus>
            <label for="inputEmail" class="sr-only ">Email</label>
            <input type="email" name="email" class="form-control mt-3" placeholder="Digite Seu Email" required
                autofocus>
            <label for="inputPassword" class="sr-only ">Senha</label>
            <input type="password" name="senha" class="form-control mt-3" placeholder="Digite a Senha" required>
            <label for="inputPassword" class="sr-only">Confirmar a Senha</label>
            <input type="password" name="senhaC" class="form-control mt-3" placeholder="Confirmar a senha" required>
            <?php
              if(isset($_SESSION['idTipoUsario']) && $_SESSION['idTipoUsario'] == 1){
                $sql="SELECT*FROM `tipousuario` WHERE nome != 'Usuario' ";
                $resultado=mysqli_query($con,$sql);  
            ?>
            <select class="form-control mt-3" id="exampleFormControlSelect1" name="funcionario">
                <?php   while( $row=mysqli_fetch_assoc($resultado)){ ?>
                <option value="<?php echo $row['IdTipoUsuario']?>"><?php echo $row['nome']?></option>
                <?php
                  }
                ?>
            </select>
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="CadastroFu"
                value="CadastroFu">Cadastro</button>
            <p class="mt-5 mb-3"><a href="admin.php">Voltar</a></p>
            <?php 
            
             }
            ?>
            <?php 
             if(empty($_SESSION['idTipoUsario'])){
            ?>
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="Cadastro"
                value="Cadastro">Cadastro</button>
            <p class="mt-5 mb-3"><a href="index.php">Voltar</a></p>
            <?php 
             }
            ?>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </div>

</body>

</html>