<?php
session_start();

include "../model/UsuarioDao.php";




$usuarioDao = new UsuarioDao();
$login = $usuarioDao->login($_POST['email'], $_POST['password']);


if(!empty($login)){
    $_SESSION['usuario'] = $login;
    header('location: ../view/home.php');
}else{
    $msg = "Nenhum usuario foi encontrado";
    header('location: ../index.php?msg='.$msg);
}




?>