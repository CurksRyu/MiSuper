<?php
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    session_start();

    include('includes/dbh.inc.php');

    $consult_email = "SELECT * FROM usuario WHERE emailUsuario = '$correo'";

    $result = mysqli_query($conn, $consult_email);
    $findEmail = mysqli_num_rows($result);
    $searchColumn = mysqli_fetch_assoc($result);

    $name = $searchColumn['nombreUsuario'];
    $lastname = $searchColumn['apellidoUsuario'];
    $username = $name . ' ' . $lastname;

    $pass2 = $searchColumn['claveUsuario'];

    if ($findEmail === 0) {
        $_SESSION['notificacion'] = '<div class="notification is-danger">Correo no válido o no existente.</div>';
        header("location:login.php");
    }else if(strcmp($password, $pass2) === 0){
        $_SESSION['nombreUsuario'] = $username;
        $_SESSION['correo'] = $correo;
        header("location:index.php");
    }else{
        echo "Error de sesion";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>