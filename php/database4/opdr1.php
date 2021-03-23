
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Database4</title>

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

            <h4 class="ms-2 mt-3">Database 4</h4>
            <div class="fluid-container border rounded pt-2 pb-2">  

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Naam</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Postcode</th>
                            <th scope="col">Woonplaats</th>
                            <th scope="col">Nieuwsbrief</th>
                            <th scope="col">Verzendwijze</th>
                        </tr>
                    </thead>
                    <tbody>

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
                            $res = $pdo->query('SELECT * FROM klant WHERE nieuwsbrief = 1');
                            while ($row = $res->fetch()) {
                                $id = $row['id'];
                                $naam = $row['naam'];
                                $email = $row['email'];
                                $adres = $row['adres'];
                                $postcode = $row['postcode'];
                                $woonplaats = $row['woonplaats'];
                                $nieuwsbrief = $row['nieuwsbrief'];
                                $verzendwijze = $row['verzendwijze'];

                                if ($nieuwsbrief == "1") $nieuwsbrief = "Ja"; else $nieuwsbrief = "Nee";
                                if ($verzendwijze == "1") $verzendwijze = "Verzenden"; else $verzendwijze = "Afhalen";

                                echo "<tr>
                                    <th scope='row'>$id</th>
                                    <td>$naam</td>
                                    <td>$email</td>
                                    <td>$adres</td>
                                    <td>$postcode</td>
                                    <td>$woonplaats</td>
                                    <td>$nieuwsbrief</td>
                                    <td>$verzendwijze</td>
                                </tr>";
                            }

                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>




