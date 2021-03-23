
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
              <a href="/">Return to homepage</a>
          </div>

          <h4 class="ms-2 mt-3">Web Dev 3</h4>
          <div class="fluid-container border rounded pt-2 pb-2">   
              <b class="ms-3">Verzend gegevens van uw pakketje,</b>
              <form class="container mt-2" action="parse.php" method="post">
                  <div class="input-group mb-2">
                    <span class="input-group-text">Naam</span>
                    <input name="naam" type="text" class="form-control" placeholder="John Doe">
                  </div>
                  <div class="input-group mb-2">
                    <span class="input-group-text">E-mail</span>
                    <input name="email" type="text" class="form-control" placeholder="johndoe@mail.com">
                  </div>
                  <div class="input-group mb-2">
                    <span class="input-group-text">Adres</span>
                    <input name="adres" type="text" class="form-control" placeholder="Juice Lane 999">
                  </div>
                  <div class="input-group mb-2">
                    <span class="input-group-text">Postcode</span>
                    <input name="postcode" type="text" class="form-control" placeholder="9990 WR">
                  </div>
                  <div class="input-group mb-2">
                    <span class="input-group-text">Woonplaats</span>
                    <input name="woonplaats" type="text" class="form-control" placeholder="World">
                  </div>
                  <div class="form-check mb-2">
                    <input name="nieuwsbrief" class="form-check-input" type="checkbox" checked>
                    <label class="form-check-label">
                      Inschrijven voor de nieuwsbrief en aanbiedingen.
                    </label>
                  </div>
                  <select name="verzendwijze" class="form-select">
                      <option selected>Verzendwijze selecteren</option>
                      <option value="1">Verzenden + €4,50</option>
                      <option value="2">Afhalen + €0,-</option>
                  </select>
                  <button type="submit" class="btn btn-primary mt-3">Bestelling Afronden</button>
              </form>
          </div>

          <div class="fluid-container border rounded p-2 ps-3 mt-4">
              <a href="/php/webdev3/subscripties.php">View subscriptions</a>
          </div>
      </div>
  </body>
</html>




