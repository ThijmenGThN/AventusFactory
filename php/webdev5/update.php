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


    // Update data into database
    $sql = "UPDATE product SET categorie = :categorie, producent = :producent, naam = :naam, soort = :soort, land = :land, prijs = :prijs, voorraad = :voorraad";
    $res = $pdo->prepare($sql);
    $values = [
        'categorie' => $_POST['categorie'],
        'producent' => $_POST['producent'],
        'naam' => $_POST['naam'],
        'soort' => $_POST['soort'],
        'land' => $_POST['land'],
        'prijs' => $_POST['prijs'],                
        'voorraad' => $_POST['voorraad']
    ];
    $res->execute($values);


    // Return
    header('Location: /php/webdev5/');
    exit;

?>