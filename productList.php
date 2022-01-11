<?php
    session_start();
    if(isset($_SESSION['nombreUsuario']) || isset($_SESSION['correo'])){
        $nombreUsuario = $_SESSION['nombreUsuario'];
        $correo = $_SESSION['correo'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/img/icon.png">
    <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../public/css/alertify.min.css">
    <link rel="stylesheet" href="../public/css/themes/semantic.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/JavaScript"></script>
    <script src="../public/js/alertify.min.js" type="text/JavaScript"></script>
    <script src="../public/js/scripts.js" type="text/JavaScript"></script>
    <title>Producto - Mi Super</title>
</head>
<body>

<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <div class="navbar-item py-0" href="#">
            <a href="index.php"><img src="./img/generico_blanco.png" class="image is-480x600" style="max-height: 50px" title="Mi Super"></a>
            </div>
            
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="map.php">
                    Mapa
                </a>
                <a class="navbar-item" href="./productList.php">
                    Productos
                </a>
                <div class="navbar-item" >
                    <div class="field has-addons ">
                        <div class="control ">
                            <input class="input has-text-black pr-6" type="text"  placeholder="Buscar Producto...">
                        </div>
                        <div class="control">
                            <a href="#" class="button is-dark px-5">
                                <span class="icon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>    
            
            <div class="navbar-end">
            <div id="carrito" class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" id="mostrarUsuario">
                        <span class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <span> Mi Cesta</span>
                    </a>
                    <div class="navbar-dropdown is-right" id="displayUser">
                        <!--JS-->
                        <table class="table is-narrow is-size-7-mobile">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio Unitario</th>
                                    <th>Imagen</th>
                                    <th>Cantidad</th>
                                    <th>Supermercado</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="lista-carrito"></tbody>
                        </table>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" id="mostrarUsuario">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span> Mi Cuenta</span>
                    </a>
                    <div class="navbar-dropdown is-right" id="displayUser">
                    <?php 
                        if (isset($correo)){
                            ?> 
                        <div class="navbar-item">
                            <p class="is-size-6">Sesión iniciada como: <br> <strong> <?php echo $nombreUsuario ?> </strong></p>
                        </div>
                        <hr class="navbar-divider">
                        <a href="./logout.php" class="navbar-item">
                            <p class="is-size-6"><strong>Cerrar sesión</strong></p>
                        </a>
                        <?php }else{
                            ?>
                        <a href="./login.php" class="navbar-item">
                            <p class="is-size-6"><strong>Iniciar Sesión</strong></p>
                        </a>
                        <hr class="navbar-divider">
                        <a href="./user.php" class="navbar-item">
                            <p class="is-size-6"><strong>Registrarse</strong></p>
                        </a>
                        <?php } ?>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </nav>
                    <!-- LISTA DE PRODUCTOS -->

    <section class="section pb-0 pt-5 ">
        <nav class="breadcrumb is-medium has-arrow-separator p-3" aria-label="breadcrumbs">
            <ul>
                <li><a href="./index.php">Inicio</a></li>
                <li class="is-active"><a href="./productList.php" aria-current="page">Producto</a></li>
            </ul>
        </nav>
    </section>


    <section class="section pt-3 px-0 ">
        <div class="container is-fluid ">
            <div class="columns is-multiline">
                <div class="column mr-5 is-full-touch is-narrow-desktop">
                    <div class="card is-radiusless ">
                        <div class="card-content">
                            <p class="is-size-5">Precio</p>
                            <input class="slider  is-success" step="1" min="0" max="100" value="50" type="range">
                            <p class="is-size-5">Palabra clave</p>
                            <div class="field has-addons ">
                                <div class="control is-expanded">
                                    <input class="input has-text-black " type="text"  placeholder="Buscar">
                                </div>
                                <div class="control">
                                    <a href="#" class="button is-link ">
                                        <span class="icon">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <p class="is-size-5">Datos</p>
                            <div class="field has-addons ">
                                <div class="control is-expanded">
                                    <input class="input has-text-black " type="text"  placeholder="Marca">
                                </div>
                                <div class="control ">
                                    <a href="#" class="button is-link ">
                                        <span class="icon">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </a>
                                </div>
                                
                            </div>
                            <div class="field has-addons ">
                                <div class="control is-expanded">
                                    <input class="input has-text-black " type="text"  placeholder="Supermercado">
                                </div>
                                <div class="control">
                                    <a href="#" class="button is-link ">
                                        <span class="icon">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="column">
                    <div id="app" class="columns is-multiline">
                    </div>
                </div>

                <div class="column is-full">
                    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                        <a href="javascript:prevPage()" id="btn_prev" class="pagination-previous">Anterior</a>
                        <a href="javascript:nextPage()" id="btn_next" id="next" class="pagination-next">Siguiente</a>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>
    </section>

    <footer class="footer has-background-black-ter">
        <div class="columns is-centered is-mobile">
            <figure class="imagen is-16x16">
                <img src="./img/otroEstilo_blanco.png" alt="Logo Misuper" title="Mi Super" width="200px">
            </figure>
        </div>
        <div class="columns is-centered">
            <div class="column is-size-4 is-one-fifth has-text-centered">
                <a class=" has-text-white" id="acerca">
                    Acerca de
                </a>
            </div>
            <div class="column is-size-4 is-one-fifth has-text-centered">
                <a class="has-text-white" id="tiendas">
                    Tiendas Asociadas
                </a>
            </div>
            <div class="column is-size-4 is-one-fifth has-text-centered">
                <a class="has-text-white" id="about-us">
                    Quienes Somos
                </a>
            </div>
        </div>
        <div class="content has-text-centered has-text-white has-">
            <strong class="has-text-white">&copy</strong> Mi Super 2021
        </div>
    </footer>
    <script src="js/app.js" type="module"></script>
    <script src="js/cesta.js"></script>
    
</body>
</html>