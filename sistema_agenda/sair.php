<?php session_start();
unset(
         $_SESSION['email'],
         $_SESSION['senha'],
         $_SESSION['usuario_logado']

    );   

     $_SESSION['logindeslogado'] = "Deslogado com sucesso!";
    
    header("Location: logar.php");
?>