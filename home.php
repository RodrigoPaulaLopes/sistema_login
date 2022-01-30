<?php session_start()?>
<?php include "./components/header.php"?>
<?php
   
    require_once "./model/UsuarioDao.php";
    $usuarioDao = new UsuarioDao();
    $usuario = [];
    $usuarios = $usuarioDao->mostrarTodos();
    foreach ($usuarios as $u) {
        array_push($usuario, $u);
    }

    if(isset($_GET['excluir'])){
        $id = $_GET['excluir'];
        $usuarioDao->excluirUsuarios($id);

        header('location: home.php');
    }
  
    
?>
<div class="container">
<div class=" border-bottom mb-3 mt-2 ">
    <ul class="nav d-flex justify-content-between">
    <li class="nav-item">
        <a class="nav-link active" href="./formulario.php">Cadastrar Novos Usuarios</a>
    </li>
    
    <li>
        <a href="./classes/deslogar.php" class="btn btn-danger">
        <i class="bi bi-box-arrow-in-left"></i> Sair
        </a>
    </li>
    </ul>
</div>
    <h1>Olá, Seja bem vindo <span class="text-info"><?php echo $_SESSION['usuario'][1]?></span></h1>

    <table class="table">
        <thead>
            <th>ID</th> 
            <th>NOME</th> 
            <th>EMAIL</th> 
            <th>TIPO</th> 
            <th>STATUS</th> 
            <th>OPÇÕES</th> 
        </thead>
        <tbody>
            <?php foreach ($usuario as $users) :?>
            <tr>
                <td><?=$users['id']?></td>
                <td><?=$users['name']?></td>
                <td><?=$users['email']?></td>
                <td><?=$users['type']?></td>
                <td><?=$users['status']?></td>
                <td>
                    <a href="/formulario.php?Editar=<?=$users['id']?>" class="btn btn-outline-success">Editar</a>
                    <a href="/home.php?excluir=<?=$users['id']?>" class="btn btn-outline-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach;?>

        </tbody>
    </table>

</div>
<?php include "./components/footer.php"?>