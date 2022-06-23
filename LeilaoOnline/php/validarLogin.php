<?php
 include "conexao.php";
 if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha= $_POST['senha'];
    
    $mysqli= "SELECT*FROM `usuario` WHERE email = '$email'";
    
    $resultado=mysqli_query($con,$mysqli);
    $row = mysqli_fetch_array($resultado);
    echo  $row['nome'];
    //     if($resultado){
    //       session_start();
    //      
        //   if(!empty($row)){
        //     $_SESSION['nome'] = $row['nome'];
        //     $_SESSION['email'] = $row['email'];
        //      echo  $row['nome'];
        //     // header("Location: home.php");
        //     //header("Location: visualizar.php");
        //   }
        // //   else {
        //     unset($_SESSION['nome']);
        //     unset($_SESSION['email']);
        //     unset($_SESSION['id']);
        //     unset($_SESSION['cargo']);
        //     header("Location: login.php?msg=LOGIN_ERROR");}
        // }else{
        //     header("Location: login.php?msg=ERRO");
        // }
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