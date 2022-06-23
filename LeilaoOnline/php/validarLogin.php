<?php
 include "conexao.php";
 if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha= $_POST['senha'];
    
    $mysqli= "SELECT*FROM `usuario` WHERE usuario = '$usuario' AND senha ='$senha'";
    
    $resultado=mysqli_query($con,$mysqli);
        if($resultado){
          $row = mysqli_fetch_array($resultado);
          if(!empty($row)){
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['cargo'] = $row['cargo'];
            
            header("Location: home.php");
            //header("Location: visualizar.php");
          }else {
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['id']);
            unset($_SESSION['cargo']);
            header("Location: login.php?msg=LOGIN_ERROR");}
        }else{
            header("Location: login.php?msg=ERRO");
        }
}
else{
  
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
         echo'kene';
         echo $nome;
         echo $email;
         echo $senha;
        $sql = "INSERT INTO usuario (nome,email,senha,IdTipoUsuario) 
        VALUES('$nome','$email','$senha','3')";
      
      $resultado=mysqli_query($con,$sql);
      header('location:index.php?msg=sucessoLogin');
  
        // if($resultado){
        //     header('location:index.php');
        // }else{
        //     die(mysqli_error($con));
        //     header('location:index.php?msg=erroInsert');
        // }

}

?>