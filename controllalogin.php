<?php

//accesso al database
$host='localhost';
$username='root';
$password='';
$db_nome='progetto';
$tab_nome="cliente";


$result = mysql_pconnect($host, $username, $password);
if($result===false){
    trigger_error('Impossibile connettersi al server: ' . mysql_error(), E_USER_NOTICE);
}
$result = mysql_select_db($db_nome);
if($result===false){
    trigger_error('Accesso al database non riuscito: ' . mysql_error(), E_USER_NOTICE);
}

//acquisizione dati dal form HTML
$username = $_POST['username'];
$password = $_POST['password'];

//controlli per l'input
if($password===null || $password>==0){
    trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
}

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