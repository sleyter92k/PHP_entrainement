<!-- page pour contacte labase de donne et pour affichher -->
<?php

$base_BD = new PDO( 'mysql:host=localhost;dbname=cbs_php_inter_mostapha',// hôte nom BDD
              'root',// pseudo 
              // '',// mot de passe
              '',// mdp pour MAC avec MAMP
              array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// afficher les erreurs SQL dans le navigateur
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// charset des échanges avec la BDD
              ));
              // debug($pdoENT);
              // debug(get_class_methods($pdoENT));
              ?>
    <?php    
if (!empty($_POST)) { // est-ce que $_POST n'est pas vide
    $_POST['title'] = htmlspecialchars($_POST['title']); // pour se prémunir des failles et des injections SQL
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['zip_code'] = htmlspecialchars($_POST['zip_code']);
    $_POST['city'] = htmlspecialchars($_POST['city']);
    $_POST['type'] = htmlspecialchars($_POST['type']);
    $_POST['price'] = htmlspecialchars($_POST['price']);
    $_POST['reservation_message'] = htmlspecialchars($_POST['reservation_message']);


    $insertion = $base_BD->prepare(" INSERT INTO advert  (title,description,zip_code,city,type,price,reservation_message)
   VALUES ( :title, :description, :zip_code,:city, :type, :price,:reservation_message) "); // requete préparée avec des marqueurs

    $insertion->execute(array(
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':zip_code' => $_POST['zip_code'],
        ':city' => $_POST['city'],
        ':type' => $_POST['type'],
        ':price' => $_POST['price'],
        ':reservation_message' => $_POST['reservation_message'],
    ));
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,600;0,700;1,200;1,300;1,400;1,600&family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,600;0,700;1,200;1,300;1,400;1,600&family=Orelega+One&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="stayle.css">
    <title>form Annonce</title>
</head>

<body class="bg-white text-dark ">
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded " aria-label="Eleventh navbar example">
    <div class="container-fluid">
      <a class="navbar-brand active"  href="accueil.php">Page d'accueil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#form">Ajoute une annonce</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#table">Consulter toutes les annonces</a>
          </li>
        </ul>
      
      </div>
    </div>
  </nav>
    <?php ?>
    <div class="d-flex  justify-content-center">
        <h1 class=" text-center shadow p-3 mb-2 mt-4 bg-white w-50 round">Annonce</h1>
    </div>

    <div id="form" class="container w-50 mx-auto">
        <div class="row mt-5 mb-5   bg-gradient border-primary ">
            <form action="" method="POST" class=" shadow-lg p-3 mb-5 bg-white rounded   rounded-start rounded-bottom">
                <div class="mb-3 font ">
                    <label for="title" class="form-label"><i class="bi bi-people-fill"></i></label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="votre title" required>
                </div>
                <div class="mb-3 font">
                    <label for="description" class="form-label" cols="20" rows="5"><i class="bi bi-card-text"></i></label>
                    <textarea type="text" name="description" id="description" class="form-control" placeholder=" votre description" required></textarea>
                </div>
                <div class="mb-3 font">
                    <label for="" class="form-label"><i class="bi bi-house-door-fill"></i></label>
                    <input type="number" name="zip_code" id="zip_code" class="form-control" placeholder="EX:93500" required>
                </div>
                <div class="mb-3 font">
                    <label for="" class="form-label"><i class="bi bi-building"></i></label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="EX : Pantin" required>
                </div>
                <div class="mb-3 font">
                    <!-- https://getbootstrap.com/docs/5.1/forms/checks-radios/ -->
                    <label for="sexe" class="form-label">type </label><br>
                    <input type="radio" name="type" value="location" id="sexe" checked> location <br>
                    <input type="radio" name="type" value="vente" id="sexe"> Vente
                </div>
                <div class="mb-3 font">
                    <label for="price" class="form-label"><i class="bi bi-cash-coin"></i></label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="votre prix" required>
                </div>
                <div class="mb-3 font">
                    <label for="message" class="form-label"><i class="bi bi-envelope-fill"></i></label>
                    <textarea name="reservation_message" id="reservation_message" cols="30" rows="10"></textarea>
                </div>


                <button type="submit" class="btn btn-primary mb-4">Envoyer votre message</button>

            </form>
        </div>
        <div id="table" class="row">
            <?php
            // 3 affichage de données 
            $resultat = $base_BD->query(" SELECT * FROM  advert  ");

            $nbr_advert  = $resultat->rowCount();

            ?>
            <table class="table table-primary shadow-lg p-3 mb-5 bg-white rounded  ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Zip_code</th>
                        <th>City</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Reservation_message</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ouverture de la boucle while -->
                    <?php while ($annonce = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td class="bg-light"><?php echo $annonce['id']; ?></td>
                            <td class="bg-success"><?php echo strtoupper ($annonce['title']); //Affichage du title en majuscule  ?></td>
                            <td class="bg-info"><?php echo $annonce['description']; ?></td>
                            <td class="bg-warning"><?php echo $annonce['zip_code']; ?></td>
                            <td class="bg-info"><?php echo $annonce['city']; ?></td>
                            <td class="bg-danger"><?php echo $annonce['type']; ?></td>
                            <td class="bg-secondary"><?php echo $annonce['price']."€"; ?></td>
                            <td class="bg-light"><?php echo $annonce['reservation_message']; ?></td>
                            <td class="bg-info"><a href="update.php? id=<?php echo $annonce['id'] ?>"><i class="bi bi-arrow-repeat"></i></a></td>
                        </tr>
                        <!-- fermeture de la boucle -->
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>