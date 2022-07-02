<!doctype html>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <?php 
          if (isset($_GET['msg']))  {
            echo ' <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                      Email ou senha esta errado ppor favor  digite os dados correctos
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <br>';
          }
        ?>
         <form class="form-signin text-center" action="php/validarLogin.php" method="post">
        <img class="mb-4" src="img/bootstrap-solid.svg" alt="" width="72"
            height="72">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Digite Seu Email" required
            autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Digite a Senha"
            required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" valeu="login">Sign in</button>
        <p class="mt-5 mb-3"><a href="php/CriarConta.php">Criar uma conta</a></p>
        <p class="mt-5 mb-3"><a href="index.php">Voltar</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
    </div>

   
</body>

</html>