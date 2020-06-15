<?php
session_start();
?>
<?php


$servername = "localhost";
$database = "tienda";
$username = "root";
$password = "";


$conexion=mysqli_connect("localhost","root","","tienda");
if (!$conexion) {
      die("Connection failed: " . mysqli_connect_error());
}
 
//echo "Connected successfully";

 $u = $_POST["u"]; //usuario
//$p = $_POST["pp"]; //palabra de paso sin codificar
$p = md5($_POST["pp"]); // para codificar la contraseña md5

 $miselect ="select nombre, pas from usuario where nombre= '$u' and pas= '$p'";
 //echo $miselect;

  
 $cursor=mysqli_query($conexion, $miselect); 

$c =mysqli_num_rows($cursor);
 
if($c== 1)
{
	$_SESSION["usuario"]= $u;
	echo'<script type="text/javascript">
    alert("has iniciado sesion");
    window.location.href="index.html";
    </script>';
	//echo "<script> window.location='inicio.html'; </script>";
	
	 //echo "<h2 class=\"error\">haz iniciado sesion $u ya puedes realizar tu pedido</h2>";
	//echo "has iniciado sesión correctamente, bienvenido"  .$u;
	// header("location:inicio.html"); 
  }
   
  else {
 
	$_SESSION["usuario"]= "invitado";
	 echo'<script type="text/javascript">
    alert("no has iniciado sesion");
    window.location.href="login.html";
    </script>';
	//echo "no estas registrado, por favor registrate!";
    }
 
 mysqli_close($conexion);
 
 ?>
<html>
<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
<body>
<div id="registro">

<blockquote>
  <p class="alert-success"> <strong><a href="login.html" class="btn btn-primary btn-lg" style="text-align: right; color: #000000; font-size: x-large; font-weight: bolder;" role="button">INICIA SESION</a></strong> </p>
</blockquote>
		<center>
		<img src="images/registro.png" alt="" name="reg" width="378" height="396" class="alert" id="reg"/><BR>
		</center>
			</div>
</body>
</html>
 