<?php

require_once "../model/UsuarioDao.php";


session_start();

$usuarioDao = new UsuarioDao();
$login = $usuarioDao->login($_POST['email'], $_POST['password']);

if(!empty($login)){
    $_SESSION['usuario'] = $login;
    header('location: index.php');
}else{
    echo 'olá mundo!';
}

he



?>