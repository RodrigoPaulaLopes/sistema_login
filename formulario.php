<?php
    session_start();
    require "./model/UsuarioDao.php";
    require "./classes/Usuario.php";
    if(empty($_POST['id'])){
        
    }
?>
<?php include "./components/header.php"?>
<div class="container">
<div class="border-bottom mb-5 mt-2">
    <ul class="nav d-flex justify-content-between">
    <li class="nav-item">
        <a class="nav-link active" href="./home.php">Voltar</a>
    </li>
    
    <li>
        <a  href="./classes/deslogar.php" class="btn btn-danger">
            <i class="bi bi-box-arrow-in-left"></i> Sair
        </a>
    </li>
    </ul>
</div>
<form  method="post">
    <h1>Cadastre um novo usuario</h1>
    <input type="hidden" name="id" value="">
    <div class="form-group mb-2">
        <label for="" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label for="" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label for="" class="form-label">Senha</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label for="exampleFormControlSelect1">Tipo</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option></option>  
            <option>Administrador</option>
            <option>Usuario</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label for="exampleFormControlSelect1">Status</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option></option>  
            <option>Ativo</option>
            <option>Cancelado</option>
        </select>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-outline-secondary">Cadastrar</button>
 
    </div>

</form>
</div>
