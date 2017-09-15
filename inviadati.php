<?php
    
    $host="localhost";
    $username="root";
    $password="";
    $db_nome="progetto";
    
    mysql_connect($host, $username, $password) or die('Impossibile connettersi al server: ' . mysql_error());
    mysql_select_db($db_nome) or die ('Accesso al database non riuscito: ' . mysql_error());
    
    //acquisizione dati dall'adattatore; protocollo non noto
    $stringa = $_POST['stringa'];
    
    
    //inserimento dei dati nel database
    $insert = "INSERT INTO gestoredatistringa (stringa) VALUES ('$stringa')";
    
    $result = mysql_query($insert); //esecuzione della query di inserimento
    
    if (!$result) {
	die("Errore nella query $insert: " . mysql_error());
    }else{
        // redirect verso pagina interna
        header("location: /elaboradati.php");   
    }
    
    
    
    // chiudo la connessione a MySQL
    mysql_close();

    
?>