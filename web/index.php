    <!doctype html>

<?php
session_start();
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
	<meta charset="utf-8" />
</head>
<body>

 
<div>
 <h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
 <p><a href="../index.php">Finalice</a> sesion aqui!</p>
</div>
  
</body>

</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>