<?php

    //verdindingsvariabelen database 
    $host = 'localhost';
    $db   = 'aventus-170831_master';
    $user = 'avent_170831';
    $pass = 'unA4frlf95!QdxRd';
    $charset = 'utf8mb4';


    //connection string en PDO settings
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
 
 
    //verbinding maken met database
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }


    // Insert new data into database
    $sql = 'INSERT INTO product (type, producent, naam, soort, land, prijs, voorraad) VALUES (:type, :producent, :naam, :soort, :land, :prijs, :voorraad)';
    $res = $pdo->prepare($sql);
    $values = [
        'type' => $_POST['type'],
        'producent' => $_POST['producent'],
        'naam' => $_POST['naam'],
        'soort' => $_POST['soort'],
        'land' => $_POST['land'],
        'prijs' => $_POST['prijs'],                
        'voorraad' => $_POST['voorraad']
    ];
    $res->execute($values);

?>