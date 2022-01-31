<?php



session_start();

?>

<?php include "./components/header.php"?>
<div class="container">
    
    <h1>Login</h1>
    <?php
    if(isset($_GET['msg'])):?>
        <div class="alert alert-danger">
        <?php echo $_GET['msg'];?>
        </div>
    <?php else: ?>
        <?php session_destroy();?>
    <?php endif;?>
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
        
    </form>

</div>
<?php include "./components/footer.php"?>

    
    