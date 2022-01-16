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

    //var_dump($_GET['identity']);

    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajoute l'annonce</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php require 'link/header.php'?>
          <nav class="my-2">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="annonces.php">Annonces</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="ajuter_annonce.php">Ajouter Annonce</a>
                </li>
            </ul>
        </nav>

    <section class="row">
        <div class="col-7">
            <h2>Ajoute l'annonce ici</h2>
            <div class="border border-warning bg-success p-3">
                <form action="" method="POST" class="row g-3">
                    <div class="col-6">
                    <label for="title">Titel</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Titel" required>
                    </div>
                    <div class="col-6">
                      <label for="description">Description</label>
                      <textarea name="description" class="form-control" placeholder="Put description here" id="description"></textarea>
                    </div>
                    <div class="col-6">
                        <label for="type" class="form-label">Type</label> <br>
                        <input type="radio" name="type" value="Location" id="type" class="form-check-input" checked> Location
                        <input type="radio" name="type" value="Vente" id="type" class="form-check-input"> Vente
                    </div>
                    <div class="col-6">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="City" required>
                    </div>
                    <div class="col-6">
                        <label for="zip_code">Zip_Code</label>
                        <input type="number" name="zip_code" id="zip_code" class="form-control" placeholder="Zip_Code" required>
                    </div>
                    <div class="col-6">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Price" required>
                    </div>
                    <div class="col-6">
                      <label for="message">Description</label>
                      <textarea name="message" class="form-control" placeholder="Leave a comment here" id="message"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Ajoute</button>
                    </div>
                </form>
            </div>
            
            <?php
                if (!empty($_POST)) {
                    $_POST['title'] = htmlspecialchars($_POST['title']);
                    $_POST['description'] = htmlspecialchars($_POST['description']);
                    $_POST['zip_code'] = htmlspecialchars($_POST['zip_code']);
                    $_POST['city'] = htmlspecialchars($_POST['city']);
                    $_POST['type'] = htmlspecialchars($_POST['type']);
                    $_POST['price'] = htmlspecialchars($_POST['price']);
                    $_POST['reservation_message'] = htmlspecialchars($_POST['message']);

                    //INSERT INTO `advert`(`id`, `title`, `description`, `description`, `city`, `type`, `price`, `reservation_message`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')
                    $link = $pdoCBS->prepare( "INSERT INTO advert (title, description, zip_code, city, type, price, reservation_message) VALUES (:title, :description, :zip_code, :city, :type, :price, :reservation_message)" );
                    $link->execute(array(
                      ':title' => $_POST['title'],
                      ':description' => $_POST['description'],
                      ':zip_code' => $_POST['zip_code'],
                      ':city' => $_POST['city'],
                      ':type' => $_POST['type'],
                      ':price' => $_POST['price'],
                      ':reservation_message' => $_POST['message'],
                    ));
                  }
            ?>

        </div>
        <!-- fin col -->


        <div class="col-5">
        <div class="card text-white bg-warning mb-3" style="max-width: 30rem;">
          <h4 class="alert alert-warning">Votre Annonce ou Dernière Annonce</h4>
            <div class="card-body">
            <?php
                $link = $pdoCBS->query ( " SELECT * FROM advert ORDER BY id DESC LIMIT 1; " );
                $display = $link->fetch(PDO::FETCH_ASSOC);
                echo "<h5 class=\"card-title alert alert-info\"> Title : " .$display['title']. "</h5>";
                echo "<p class=\"alert alert-success\"> City : ".$display['city']. ", Code postal : " .$display['zip_code']. " Price : ".$display['price']. "<p>";
                echo "<p class=\"alert alert-light\"> Description : ".$display['description']."<p>";
                
              ?>
            </div>
          </div>
        </div>
        <!-- fin col -->
        
    </section>

        




    <?php require 'link/footer.php'?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>