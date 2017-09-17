<?php
    
    //accesso al database
    $host='localhost';
    $username='root';
    $password='';
    $db_nome='progetto';
    
    $result = mysql_pconnect($host, $username, $password);
    if($result===false){
        trigger_error('Impossibile connettersi al server: ' . mysql_error(), E_USER_NOTICE);
    }
    
    $result = mysql_select_db($db_nome);
    if($result===false){
        trigger_error('Accesso al database non riuscito: ' . mysql_error(), E_USER_NOTICE);
    }
    
    //acquisizione dati dall'adattatore; protocollo non noto
    $stringa = $_POST['stringa'];
    
    if($stringa===null || $stringa>==0){
	trigger_error('Errore nell\'inserimento del dato. ', E_USER_NOTICE);
    }
    
    //inserimento dei dati nel database
    $insert = "INSERT INTO gestoredatistringa (stringa) VALUES ('$stringa')";
    
    $result = mysql_query($insert); //esecuzione della query di inserimento
    
    if (!$result===false) {
	trigger_error('Errore nella query $insert: ' . mysql_error(), E_USER_NOTICE);
    }else{
        // redirect verso pagina interna
        header('location: /elaboradati.php');   
    }
    
    
    
    // chiudo la connessione a MySQL
    mysql_close();

    
?>