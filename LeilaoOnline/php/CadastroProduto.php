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
    <link rel="stylesheet" href="../css/menu.css">
</head>
</head>

<body>
    <div class="container mt-5">
        <form class="form-signin mt-5 text-center" style="max-width: 630px;" action="validarLogin.php" method="post"
            enctype="multipart/form-data">
            <!-- <img class="mb-4" id="blah" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
                width="72" height="72"> -->
            <label for="foto">
                <img id="output_image"  class="mt-5" src="../img/bootstrap-solid.svg"
                    width="200" height="100" />
            </label>
            <input type="file" class="d-none" id="foto" name="foto" accept="image/*" onchange="preview_image(event)">

            <h1 class="h3 mb-3 font-weight-normal">Produto</h1>
            <label for="inputEmail" class="sr-only">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Produto" required autofocus>
            <textarea class="form-control mt-3" placeholder="Descrição" name='descricao' require
                id="exampleFormControlTextarea1" rows="3"></textarea>
            <label for="inputPassword" class="sr-only ">Preço</label>
            <input type="number" name="preco" class="form-control mt-3"  maxlength="10"placeholder="Preço" required>
            <label for="inputPassword" class="sr-only ">Data Inicial</label>
            <input type="text" onfocus="(this.type='date')" name="datainicial" class="form-control mt-3" placeholder="Data Inicial" required>
            <label for="inputPassword" class="sr-only ">Data Final</label>
            <input type="text" onfocus="(this.type='date')" name="datafinal" class="form-control mt-3" placeholder="Data Final" required>
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="Produto"
                value="Produto">Cadastro</button>
            <p class="mt-5 mb-3"><a href="admin.php">Voltar</a></p>

            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </div>
    <script type='text/javascript'>
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
</body>

</html>