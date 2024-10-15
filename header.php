<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo BASE_URL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Titulo</title>
</head>
<body>
<?php
    session_start();
?>

    <!-- Barra de navegación personalizada -->
    <nav class="navbar navbar-expand-lg navbar-custom border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GESTOR DE GASTOS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto"> 
                <a class="nav-link" aria-current="page" href="#">Home</a>
                <!--si es el acceso publico mostrar-->
                <?php if (!isset($_SESSION['USER'])): ?>
                    <li><a href="Login" class="nav-link" aria-current="page">Iniciar Sesión</a></li>
                <?php else: ?>
                     <!--si es el acceso privado mostrar-->
                    <li><a href="Logout" class="nav-link" aria-current="page">Cerrar Sesión</a></li>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
