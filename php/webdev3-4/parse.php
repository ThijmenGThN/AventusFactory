
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>WebDev3</title>

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
                <a href=".">Return to form</a>
            </div>
        </div>

        <?php

            function preprint_r($res) {
                echo "
                <div class='container'>
                    <h4 class='ms-2 mt-3'>Web Dev 3</h4>
                    <div class='fluid-container border rounded pt-2 pb-2'>
                        <b class='ms-3'>Verzend gegevens van uw pakketje,</b>
                        <pre class='ms-4'>";
                            print_r($res);
                echo "
                        </pre>
                        <b class='ms-2 mt-3'>Uw bestelling word verwerkt!</b>
                    </div>
                </div>";
            }
            preprint_r($_POST);


            // Gebruiker toevoegen aan nieuwsbrief.txt als dit aangegeven is.
            if ($_POST['nieuwsbrief'] == "on") {
                $file=fopen("nieuwsbrief.txt","a+") or exit("Iets ging mis! Probeer het later opnieuw.");
                echo fwrite($file, $_POST['email']."\n");
                fclose($file);
            }


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
            $sql = 'INSERT INTO klant (naam, email, adres, postcode, woonplaats, nieuwsbrief, verzendwijze) VALUES (:naam, :email, :adres, :postcode, :woonplaats, :nieuwsbrief, :verzendwijze)';
            $res = $pdo->prepare($sql);
            $nieuwsbrief = '0';
            if ($_POST['nieuwsbrief'] == "on") $nieuwsbrief = '1';
            $values = [
                'naam' => $_POST['naam'],
                'email' => $_POST['email'],
                'adres' => $_POST['adres'],
                'postcode' => $_POST['postcode'],
                'woonplaats' => $_POST['woonplaats'],
                'nieuwsbrief' => $nieuwsbrief,                
                'verzendwijze' => $_POST['verzendwijze']
            ];
            $res->execute($values);

        ?>
    </body>
</html>



