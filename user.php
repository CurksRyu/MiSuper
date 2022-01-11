<?php
    require("includes/dbh.inc.php");

    $resultado = 0;

    if (@$_POST['registro']) {
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['password'])) {
            
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['password'];
            //$contraseña = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $query = mysqli_query($conn, "SELECT * FROM usuario WHERE emailUsuario = '$correo'");
            
            $verificar = mysqli_fetch_array($query);
            
            if ($verificar > 0 ) {
                $alerta = '<div class="notification is-danger">Usuario con correo ya registrado</div>';
            }else{
                
                $sql = "INSERT INTO usuario(rolUsuario, nombreUsuario, apellidoUsuario, emailUsuario, claveUsuario) VALUES('usuario','$nombre','$apellido','$correo','$contraseña')";
                
                $resultado = mysqli_query($conn, $sql);
                if ($resultado) {
                    $alerta = '<div class="notification is-success">Usuario registrado!</div>';
                }else{
                    $alerta = '<div class="notification is-danger">Error inesperado.</div>';
                    echo $resultado;
                }
                
            }
        }else{
            $alerta = '<div class="notification is-danger">Deben ingresarse todos los datos</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="node_modules/bulma/css/bulma.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="css/alertify.min.css">
    <link rel="stylesheet" href="css/themes/semantic.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/JavaScript"></script>
    <script src="js/alertify.min.js" type="text/JavaScript"></script>
    <script src="js/scripts.js" type="text/JavaScript"></script>
    <title>Registrarse</title>
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
                        <a href="./login.php" class="navbar-item">
                            <p class="is-size-6"><strong>Iniciar Sesión</strong></p>
                        </a>
                        <hr class="navbar-divider">
                        <a href="./user.php" class="navbar-item">
                            <p class="is-size-6"><strong>Registrarse</strong></p>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </nav>
    <!--Formulario-->
    <section class="section is-medium ">
        <div class="container">
            <h1 class="title is-1 is-spaced">Registro</h1>
            <!-- alerta -->
            <?php echo isset($alerta) ? $alerta : '' ?>
            <form action="" method="post">
                <div class="field">
                    <label class="label">Nombre</label>
                    <div class="control">
                        <input class="input" name="nombre" type="text" placeholder="Ej: Douglas">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Apellido</label>
                    <div class="control">
                        <input class="input" name="apellido" type="text" placeholder="Ej: Acao">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Correo Electronico</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="email" name="correo" placeholder = "Correo@Electronico.com" value="">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Contraseña</label>
                    <div class="control">
                        <input class="input" name="password" type="password">
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <input name="registro" type="submit" class="button is-primary" value="Registrarse">
                    </div>
                    <div class="control pt-2">
                        <a href="./index.php">Cancelar</a>
                    </div>
                </div>
            </form>
            <div class="pt-3">
                <a href="./login.php">¿Ya estas registrado? Iniciar Sesión</a>
            </div>
        </div>
    </section>
    <!--Fin formulario-->
    <footer class="footer has-background-black-ter">
        <div class="columns is-centered is-mobile">
            <figure class="imagen is-16x16">
                <img src="img/otroEstilo_blanco.png" alt="Logo Misuper" title="Mi Super" width="200px">
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
</body>
</html>