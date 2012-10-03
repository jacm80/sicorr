?<php
session_star();
if (!isset($POST['usuario'])){
header("location: login.php");
} else{
$id = mysql_connect("localhost","","");
mysql_select_db("sicorr", $id);
$consulta = "SELECT * FROM Usuarios WHERE usuario = '{$POST[usuario']}' AND password = '{$_POST['password']}'"; 
$datos = mysql_query($consulta, $id); 
$numDatos = @mysql_num_rows($datos); 
if ($numDatos <= 0) { 
echo "Error: usuario o contraseña incorrectos. O usuario no dado de alta.<br>"; 
} else { 
$_SESSION['User'] = $_POST['usuario']; 
header("Location: " . mysql_result($datos, 0, 3); // registro 0, campo 3, que será la página personal del usuario
}
} 




?>
