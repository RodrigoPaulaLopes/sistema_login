<?php



// $usuarioDao = new UsuarioDao();

// $rs = $usuarioDao->mostrarTodos();
?>

<?php include "./components/header.php"?>
<div class="container">
    
    <h1>Login</h1>
    <form action="./classes/login.php" method="post">
        <div class="mb-3 col-12">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="exemplo@email.com">
        </div>
        <div class="mb-3 col-12">
            <label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 col-12">
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-box-arrow-in-right"></i> Entrar
            </button>
        </div>
        <div class="mb-3">
            <a href="#">Cadastrar novo usuario.</a>
        </div>
    </form>

</div>
<?php include "./components/footer.php"?>

    
    