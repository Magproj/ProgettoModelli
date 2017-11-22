<?php

$host="localhost";
$username="root";
$password="";
$db_nome="progetto";
$tab_nome="cliente";


mysql_connect($host, $username, $password) or die('Impossibile connettersi al server: ' . mysql_error());
mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());

//acquisizione dati dal form HTML
$username = $_POST['username'];
$password = $_POST['password'];

//protezione per SQL injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$passmd5 = md5($password);

//lettura della tabella utenti
$sql = "SELECT * FROM $tab_nome WHERE Username='$username' AND Password='$password'";
$result = mysql_query($sql);
$conta = mysql_num_rows($result);
if($conta>0){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("Location: opzionicliente.php");
}
elseif($username=="admin" && $password=="admin"){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("Location: opzioniazienda.php");
}
else {
    echo "Identificazione non riuscita: nome utente o password errati <br />";
    echo "Torna a pagina di <a href=\"Login.html\">login</a>";
}

?>