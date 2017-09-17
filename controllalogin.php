<?php

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'progetto');
    
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($mysqli->connect_errno){
    trigger_error('Connection failed: ' . $mysqli->connect_error, E_USER_NOTICE);
}

//acquisizione dati dal form HTML
$username = $_POST['username'];
$password = $_POST['password'];

//controlli per l'input
if($password===null){
    trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
}

//protezione per SQL injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$passmd5 = md5($password);

//lettura della tabella utenti
$sql = sprintf("SELECT * FROM cliente WHERE Username='%s' AND Password='%s'", mysqli_real_escape_string($mysqli, $username), mysqli_real_escape_string($mysqli, $password));
$result = $mysqli->query($sql);
$conta= mysqli_num_rows($result);
if($conta>0){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("Location: opzionicliente.php");
}
elseif($username==='admin' && $password==='admin'){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header('Location: opzioniazienda.php');
}
else {
    echo 'Identificazione non riuscita: nome utente o password errati <br />';
    $str = "Torna a pagina di <a href=\"Login.html\">login</a>";
    echo $str;
}

?>