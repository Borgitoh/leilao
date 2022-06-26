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
            $_SESSION['id'] = $row['Idsuario'];
            if($row['idTipoUsuario']= 1 || $row['idTipoUsuario']= 2) 
             header("Location: admin.php");
             else
               header("Location: ../index.php");
        }
           else {
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['id']);
            unset($_SESSION['cargo']);
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
      // header('location:index.php?msg=sucessoLogin');
  
}
?>