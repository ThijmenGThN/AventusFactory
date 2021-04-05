
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
            <a href="/php/webdev5/">Return and abort edit</a>
        </div>

        <h4 class="ms-2 mt-3">Web Dev 5</h4>
        <div class="fluid-container border rounded pt-2 pb-2">

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
                $id = $_POST['id'];
                $res = $pdo->query("SELECT * FROM product WHERE productID = $id");

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
                        <form class='container' action='update.php' method='post'>
                            <input required value='$id' name='Tid' type='text' class='form-control mb-2'>
                            <input required value='$naam' name='naam' type='text' class='form-control mb-2' placeholder='Naam'>
                            <input required value='$producent' name='producent' type='text' class='form-control mb-2' placeholder='Producent'>
                            <input required value='$categorie' name='categorie' type='text' class='form-control mb-2' placeholder='Categorie'>
                            <input required value='$soort' name='soort' type='text' class='form-control mb-2' placeholder='Soort'>
                            <input required value='$land' name='land' type='text' class='form-control mb-2' placeholder='Land'>
                            <input required value='$prijs' name='prijs' type='number' class='form-control mb-2' placeholder='Prijs'>
                            <input required value='$voorraad' name='voorraad' type='number' class='form-control mb-2' placeholder='Voorraad'>
                            <button type='submit' class='btn btn-primary w-100'>Update</button>
                        </form>";

                }
                    
            ?>

        </div>
    </div>
</body>
</html>




