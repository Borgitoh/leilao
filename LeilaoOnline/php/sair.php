<?php
 session_start();
if (isset($_GET['sessao'])){
    session_destroy();
}

if(!$_SESSION['nome']){
    header("Location: ../login.php");
}

?>