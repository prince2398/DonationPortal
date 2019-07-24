<?php
    $dsn = 'mysql:host='.DBHOST.';dbname='.DBNAME;

    try {
        $pdo = new PDO($dsn,DBUSER,DBPASSWORD);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch( PDOException $e ) {
        die("Error in Connection ".$e->getCode() .': '. $e->getMessage());
    }
?>