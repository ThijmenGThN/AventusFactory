
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
                <a href=".">Return to homepage</a>
            </div>
        </div>

        <?php

            function out($res) {
                echo "
                <div class='container'>
                    <h4 class='ms-2 mt-3'>Web Dev 3</h4>
                    <div class='fluid-container border rounded pt-2 pb-2'>
                        <b class='ms-3'>Nieuwsbrief subscriptie lijst,</b>
                        <p class='ms-4'>";
                            print_r($res);
                echo "
                        </p>
                    </div>
                </div>";
            }

            // Open niewsbrief.txt
            out(preg_replace("/\s+/", "; ", file_get_contents("nieuwsbrief.txt")));

        ?>
    </body>
</html>



