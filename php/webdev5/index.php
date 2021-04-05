
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>WebDev5</title>

    <link href="https://bootswatch.com/4/spacelab/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="fluid-container bg-primary text-light">
        <p class="text-center pt-2 pb-2">Thijmen Heuvelink - Student Aventus - Software Developer</p>
    </div>

    <div class="container">
        <div class="fluid-container border rounded p-2 ps-3">
            <a href="/">Return to homepage</a>
        </div>

        <h4 class="ms-2 mt-3">Web Dev 5</h4>
        <div class="fluid-container border rounded pt-2 pb-2">

            <form class="container" action="append.php" method="post">
                <input required name="naam" type="text" class="form-control mb-2" placeholder="Naam">
                <input required name="producent" type="text" class="form-control mb-2" placeholder="Producent">
                <input required name="categorie" type="text" class="form-control mb-2" placeholder="Categorie">
                <input required name="soort" type="text" class="form-control mb-2" placeholder="Soort">
                <input required name="land" type="text" class="form-control mb-2" placeholder="Land">
                <input required name="prijs" type="number" class="form-control mb-2" placeholder="Prijs">
                <input required name="voorraad" type="number" class="form-control mb-2" placeholder="Voorraad">
                <button type="submit" class="btn btn-primary w-100">Toevoegen</button>
            </form>

        </div>

        <ul class="list-group ps-3 pe-3 mt-4">

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
            
            
                //database gegevens verwerken
                $res = $pdo->query('SELECT * FROM product');
                while ($row = $res->fetch()) {
                    $naam = $row['naam'];
                    $id = $row['productID'];
                    $producent = $row['producent'];
                    $categorie = $row['categorie'];
                    $soort = $row['soort'];
                    $land = $row['land'];
                    $prijs = $row['prijs'];
                    $voorraad = $row['voorraad'];
                    echo "
                        <li class='list-group-item'>
                            <div class='row'>
                                <div class='col'>
                                    <span class='badge bg-secondary text-light'>ID $id</span>
                                    <span class='ms-2'>$naam ( $producent )</span>
                                    <br>
                                    <span class='badge bg-secondary mt-1 text-light'>$land</span>
                                    <span class='badge bg-secondary mt-1 text-light'>$categorie ( $soort )</span>
                                    <br>
                                    <p>Prijs: <span class='badge bg-success mt-1 text-light'>€ $prijs</span>
                                    <br>
                                    Voorraad: <span class='badge bg-success mt-1 text-light'>$voorraad stuks</span></p>
                                </div>
                                <div class='col'>
                                    <form action='edit.php' method='post'>
                                        <button class='btn btn-primary' name='id' value='$id' type='submit'>Bewerken</button>
                                    </form>
                                    <form action='delete.php' method='post'>
                                        <button class='btn btn-primary' name='id' value='$id' type='submit'>Verwijderen</button>
                                    </form>
                                </div>
                            <div>
                        </li>
                    ";
                }
            
            ?>

        </ul>
    </div>
</body>
</html>




