<!doctype html>
<html lang="de">

<head>
  <title>Liste</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

  <div class="container">
    <h1>Kundenliste</h1>
    <?php


      $pdo = new PDO('mysql:host=localhost;dbname=php_formular','root', '');
      if ($pdo) {

          $results = $pdo->query('SELECT * FROM kunde');
          foreach($results as $result) {



            // foreach($result as $zelle) {
            //   print($zelle.", ");
            // }

            print('<a href="kunde.php?id=');
            print($result['id']);
            print('" target="_blank" >');

            // print("ID = ".$result['id'].", ");
            print($result['name'].", ");
            print($result['vorname'].", ");
            // print($result['adresse'].", ");
            // print($result['email'].", ");

            print("</a>");

            print("<br />");
            
          }

      } else {
        print("Datenbankuzgriff gescheitert");
      }


    ?>

  <div class="row justify-content-center align-items-center g-2">
    

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
