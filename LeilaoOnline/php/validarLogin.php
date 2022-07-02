<?php
 include "conexao.php";
 if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha= $_POST['senha'];
    
    $mysqli= "SELECT*FROM `usuario` WHERE email = '$email' and senha = '$senha' ";
    
    $resultado=mysqli_query($con,$mysqli);
        if($resultado){
          session_start();
           $row = mysqli_fetch_array($resultado);
          if(!empty($row)){
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['idusuario'] = $row['Idusario'];
            $_SESSION['idTipoUsario'] = $row['IdTipoUsuario'];
            if($row['IdTipoUsuario'] == 1 || $row['IdTipoUsuario']== 2) { 
                header("Location: admin.php"); 
            }
          if($row['IdTipoUsuario']== 3){
                header("Location: ../index.php"); 
            }
        }
        else {
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset( $_SESSION['idusuario']);
            unset(  $_SESSION['idTipoUsario']);
            header("Location: ../login.php?msg=LOGIN_ERROR");}
        }else{
            header("Location: login.php?msg=ERRO");
        }
}
if(isset($_POST['Cadastro'])){
   
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "INSERT INTO usuario (nome,email,senha,IdTipoUsuario) 
        VALUES('$nome','$email','$senha','3')";
      
      $resultado=mysqli_query($con,$sql);
      header('location: ../login.php');
}
if(isset($_POST['CadastroFu'])){
   
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo  = $_POST['funcionario'] ;

        $sql = "INSERT INTO usuario (nome,email,senha,IdTipoUsuario) 
        VALUES('$nome','$email','$senha','$tipo')";
      $resultado=mysqli_query($con,$sql);
      header('location: admin.php');
}

if(isset($_POST['Produto'])){
   
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $datainicial  = $_POST['datainicial'] ;
  $datafinal  = $_POST['datafinal'] ;

  $uploaddir = '../imgProduto/';
  $imagem = $uploaddir . $_FILES['foto']['name'] = $nome.'.png';


  if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagem)) {
    $sql = "INSERT INTO produto (nome,descricao,preco,datainicial,datafinal,imagem,situacao) 
    VALUES('$nome','$descricao','$preco','$datainicial','$datafinal','$imagem','1')";
    $resultado=mysqli_query($con,$sql);
    header('location: ListarProduto.php');
} else {
    echo "Possível ataque de upload de arquivo!\n";
}


}

?>