<?php
    session_start();
    

    require_once "../model/UsuarioDao.php";
    
    if(isset($_GET['Editar'])){
        $usuarioDao = new UsuarioDao();

        $id = $_GET['Editar'];
        $usuarioEditar = $usuarioDao->mostrarUsuario($id);
        
    }
    
    if(empty($_POST['id']) && isset($_POST['name'])){
        
        $usuarioDao = new UsuarioDao();
        $usuario = new Usuario();

        $usuario->name = $_POST['name'];
        $usuario->email = $_POST['email'];
        $usuario->password = $_POST['password'];
        $usuario->type = $_POST['type'];
        $usuario->status = $_POST['status'];
        
        

        $usuarioDao->inserirUsuarios($usuario);
        

    }else{
        if(!empty($_POST['id'])){
            $usuarioDao = new UsuarioDao();
            $usuario = new Usuario();

            $usuario->name = $_POST['name'];
            $usuario->email = $_POST['email'];
            $usuario->password = $_POST['password'];
            $usuario->type = $_POST['type'];
            $usuario->status = $_POST['status'];
            $usuario->id = $_POST['id'];
        
        
            $_SESSION['usuario'][1] = $usuario->name;

            $usuarioDao->editarUsuarios($usuario);
            header('location: home.php');
        }
    }
    
?>
<?php 
include "../components/header.php";
$title = "Formulario";
?>
<div class="container">
<div class="border-bottom mb-5 mt-2">
    <ul class="nav d-flex justify-content-between">
    <li class="nav-item">
        <a class="nav-link active" href="./home.php">Voltar</a>
    </li>
    
    <li>
        <a  href="../classes/deslogar.php" class="btn btn-danger">
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
           <option value="<?php
           if(isset($_GET['Editar'])){
                echo $usuarioEditar['type'];
            }else{ 
                echo "";
            }?>">
            <?php
            if(isset($usuarioEditar)){
                if($usuarioEditar['type'] == "user"){
                    echo "Usuario";
                }else{
                    echo "";
                }
                if($usuarioEditar['type'] == "admin"){ 
                    echo "Administrador";
                }else{
                    echo "";
                }
            }?></option>
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label for="exampleFormControlSelect1">Status</label>
        <select class="form-control" name="status" id="exampleFormControlSelect1">
        <option value="<?php
            if(isset($_GET['Editar']) && isset($usuarioEditar)){
              echo $usuarioEditar['status']; 
            }else{
                echo "";
            }
        ?>">
         <?php
         if(isset($usuarioEditar)){
          if($usuarioEditar['status'] == "A"){
               echo "Ativo";
            }else if(!isset($usuarioEditar)){
                echo "";
            }
            if($usuarioEditar['status'] == "C" || $usuarioEditar['status'] == "c"){
                echo "Cancelado";
            }
        }?>
            </option> 
            <option value="A"> Ativo</option>
            <option value="C"> Cancelado</option>
        </select>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-outline-secondary"><?= isset($_GET['Editar']) ? "Atualizar" : "Cadastrar"?></button>
 
    </div>

</form>
</div>
