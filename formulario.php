<?php
    session_start();

    require_once "./model/UsuarioDao.php";
    
    
    if(empty($_POST['id']) && isset($_POST['name'])){
        
        $usuarioDao = new UsuarioDao();
        $usuario = new Usuario();

        $usuario->name = $_POST['name'];
        $usuario->email = $_POST['email'];
        $usuario->password = $_POST['password'];
        $usuario->type = $_POST['type'];
        $usuario->status = $_POST['status'];
        
        var_dump($usuario);

        $usuarioDao->inserirUsuarios($usuario);
        

    }else{
        if(isset($_GET['Editar'])){
            $usuarioDao = new UsuarioDao();

            $id = $_GET['Editar'];
            $usuarioEditar = $usuarioDao->mostrarUsuario($id);
            
        }
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
    <input type="hidden" name="id" value="<?= isset($_GET['Editar']) ? $usuarioEditar['id'] : "" ?>">
    <div class="form-group mb-2">
        <label for="" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" value="<?= isset($_GET['Editar']) ? $usuarioEditar['name'] : "" ?>">
    </div>
    <div class="form-group mb-2">
        <label for="" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" value="<?= isset($_GET['Editar']) ? $usuarioEditar['email'] : "" ?>">
    </div>
    <div class="form-group mb-2">
        <label for="" class="form-label">Senha</label>
        <input type="password" name="password" class="form-control" value="<?= isset($_GET['Editar']) ? $usuarioEditar['password'] : "" ?>">
    </div>
    <div class="form-group mb-2">
        <label for="exampleFormControlSelect1">Tipo</label>
        <select class="form-control" name="type" id="exampleFormControlSelect1">
            <option></option>  
            <option value="admin">Administrador</option>
            <option value="user">Usuario</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label for="exampleFormControlSelect1">Status</label>
        <select class="form-control" name="status" id="exampleFormControlSelect1">
            <option></option>  
            <option value="A"> Ativo</option>
            <option value="C"> Cancelado</option>
        </select>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-outline-secondary">Cadastrar</button>
 
    </div>

</form>
</div>
