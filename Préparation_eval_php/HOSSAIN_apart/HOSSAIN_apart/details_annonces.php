<?php

    // Connection of BDD
    $pdoCBS = new PDO('mysql:host=localhost;dbname=cbs_php_inter_hossain', 
    'root',
    '',
    // 'root',// cette ligne commentée donne le mdp pour MAC avec MAMP
    array(
    PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ));
    
    //var_dump($pdoCBS);
    //var_dump($_GET['details']);
    
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Accueil</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <?php require 'link/header.php'?>
    <!-- fin container-fluid header  -->

    <div class="container-fluid bg-light">
        <nav class="my-2">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="annonces.php">Annonces</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ajuter_annonce.php">Ajouter Annonce</a>
                </li>
            </ul>
        </nav>
      <section class="row">

        <div class="col-8 mx-auto">
          <div class="card text-white bg-success mb-3">
            <div class="card-header">Annonces</div>
            <div class="card-body">
                <?php
                    if (isset($_GET['details'])) { // On demande le détail d'un announce
                        $link = $pdoCBS->prepare( " SELECT * FROM advert WHERE id = :details " );
                        $link->execute(array(
                          ':details' => $_GET['details'] // On associe le marqueur vide à l'id
                        ));
                    }
                    $display = $link->fetch(PDO::FETCH_ASSOC);

                    echo "<h4 class=\"alert alert-warning\">Voici les détails de votre annonce</h4>";
                    echo "<h5 class=\"card-title alert alert-info\"> Title : " .$display['title']. "</h5>";
                    echo "<p class=\"alert alert-success\"> City : ".$display['city']. ", Code postal : " .$display['zip_code']. " Price : ".$display['price']. "<p>";
                    echo "<p class=\"alert alert-light\"> Description : ".$display['description']."<p>";
                    echo "<img src=\"img/logo.png\" class=\"img-fluid\" alt=\"Logo\">";
              ?>
              <a href="annonces.php" class="btn btn-warning">Retourner à la Annonces</a>
            </div>
          </div>
        </div>
        <!-- fin col -->
      </section>
      <!-- fin row -->
    </div>
    <!-- fin container  -->

	
    <!-- footer en require  -->
    <?php require 'link/footer.php'?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>