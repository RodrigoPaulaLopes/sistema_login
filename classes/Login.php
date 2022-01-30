<?php

require_once "../model/UsuarioDao.php";


session_start();

$usuarioDao = new UsuarioDao();
$login = $usuarioDao->login($_POST['email'], $_POST['password']);


if(!empty($login)){
    $_SESSION['usuario'] = $login;
    header('location: /home.php');
}else{
    
    header('location: /');
}




?>