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
$a = $_POST["ap"]; //apellido
$d = $_POST["di"]; //direccion
$e = $_POST["em"]; //correo
$m = $_POST["mo"]; //movil
 $minsertt ="insert into  usuario (nombre, pas, apellidos, direccion, correo,  movil)values ('$u','$p','$a','$d','$e','$m')";
 //echo $minsertt;
if (mysqli_query($conexion, $minsertt)) {
	echo "<h2 class=\"error\">bienvenido $u ya puedes iniciar sesion</h2>";
     // echo "se han introducido los datos, puedes iniciar sesion";
	 
} else {
	echo "<h2 class=\"error\">Error: algo ha pasado, tu correo ya esta en nuestra base de datos</h2>";
      //echo "Error: algo ha pasado, tu correo ya esta en nuestra base de datos "; //. $sql . "<br>" . mysqli_error($conexion);
}
 
 //$cursor=mysqli_query($conexion, $minsertt); 
 
 
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
