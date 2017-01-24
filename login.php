<?php

include_once "conexion.php";

function verificar_login($nombre,$contrasenya,&$result) {
    
    $sql = "SELECT * FROM usuario WHERE nombre = '$nombre' and contrasenya = '$contrasenya'";
    $rec = mysql_query($sql);
    $count = 0;
    

    while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }

    if($count == 1)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}

if(!isset($_SESSION['userid']))
{
    if(isset($_POST['login']))
    {
        $nombre = $_POST['nombre'];
        $contrasenya = $_POST['contrasenya'];
        $contrasenya = md5($contrasenya);
        
        if(verificar_login($nombre,$contrasenya,$result) == 1)
        {
            $_SESSION['nombre_rol'] = $result->rol;
            $_SESSION["login_done"] = true;
            $_SESSION['session_username']=$nombre;
            header("location:./web/index.php");

        }
        else
        {
            echo '<div class="error">Usuario o contraseña incorrectos</div>';
            
        }
    }
?>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./assets/css/login.css">
<script src="./assets/js/login.js"></script>


<div class="login-page">
  <div class="form">
    <form class="login-form" action="" method="post">
      <input type="text" name="nombre" placeholder="nombre"/>
      <input type="password" name="contrasenya" placeholder="contrasenya"/>
      <button name="login" type="submit" value="login">login</button>
    </form>
  </div>
</div>

<?php
} else {
	echo 'Su usuario ingreso correctamente.';
	echo '<a href="logout.php">Logout</a>';
}
?>