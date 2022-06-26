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
                header("Location: ../login.php"); 
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
      header('location: ../index.php');
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

?>