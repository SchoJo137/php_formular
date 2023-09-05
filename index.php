<!doctype html>
<html lang="en">

<head>
  <title>Formular</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <?php
      if (isset($_POST ["name"])) {
        print("Aufruf durch das Formular");
        $name = $_POST["name"];
        $vorname = $_POST["vorname"];
        $adresse = $_POST["adresse"];
        $email = $_POST["email"];
        $pdo = new PDO('mysql:host=localhost;dbname=php_formular','root', '');
        if ($pdo){
          print("<br />Verbindung zur Datenbank");
          $statement = $pdo->prepare("INSERT INTO kunde (name, vorname, adresse, email) VALUES (?, ?, ?,?)");
          $statement->execute(array($name,$vorname,$adresse,$email));   
          $neue_id = $pdo->lastInsertId();
          print("Neuer Nutzer mit ID $neue_id angelegt");

        } else {
          print("Verbindung gescheitert");
        }
        # print("<br />Sie haben $name, $vorname, $adresse und $email eingegeben.");
      } else {
        print("Aufruf über URL");
      }
    ?>
    <h1>Formular</h1>
    <div class="col-6">
      <form method="POST">
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
          <div id="name" class="form-text">Geben Sie Ihren Namen ein</div>
        </div>
        <div class="mb-3">
          <label for="vorname" class="form-label">Vorname</label>
          <input type="text" class="form-control" id="vorname" aria-describedby="vorname" name="vorname">
          <div id="vorname" class="form-text">Geben Sie Ihren Vornamen ein</div>
        </div>
        <div class="mb-3">
          <label for="adresse" class="form-label">Adresse</label>
          <input type="text" class="form-control" id="adresse" aria-describedby="adresse" name ="adresse">
          <div id="adresse" class="form-text">Geben Sie Ihre Adresse ein</div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-Mail</label>
          <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
          <div id="email" class="form-text">Geben Sie Ihre E-Mail ein</div>
        </div>
        <button type="submit" class="btn btn-primary">Speichern</button>
      </form>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>