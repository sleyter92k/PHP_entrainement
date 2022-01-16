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

    if (isset($_GET['identity'])) { // On demande le détail d'un announce
      //jeVar_dump($_GET);
      $link = $pdoCBS->prepare( " SELECT * FROM advert WHERE id = :identity " );
      $link->execute(array(
        ':identity' => $_GET['identity'] // On associe le marqueur vide à l'id
      ));

     // var_dump($link -> rowCount());
      if ($link -> rowCount() == 0) { // si le rowCount est égal à 0 c'est qu'il n'y a pas de'announce
        header('location:accueil.php'); // redirection vers la page de départ
        exit();
    } // fermature if isset()
      } else {
        header('location:accueil.php'); // redirection vers la page de départ
        exit();
      }


      $file = $link->fetch(PDO::FETCH_ASSOC);
      var_dump($file);
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
                    <a class="nav-link" href="ajuter_annonce.php">Ajouter Annonce</a>
                </li>
            </ul>
        </nav>

    <section class="row">
          <div class="col-8">
            <h2>Modifier Annonce</h2>
            <div class="border border-dark bg-warning p-3">
                <form action="" method="POST" class="row g-3">
                    <div class="col-6">
                    <label for="titel">Titel</label>
                        <input type="text" name="title" id="title"  value  = "<?php echo $file['title'] ?>" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="col-6">
                      <label for="description">Description</label>
                      <textarea name="description" class="form-control" placeholder="Put description here" id="description"><?php echo $file['description'] ?></textarea>
                    </div>
                    <div class="col-6">
                        <label for="type" class="form-label">Type</label> <br>
                        <input type="radio" name="type" value="Location" id="type" class="form-check-input" checked> Location
                        <input type="radio" name="type" value="Vente" <?php if (isset($file['type']) && $file['type'] == 'Vente') echo ' checked' ;?> id="type" class="form-check-input"> Vente
                    </div>
                    <div class="col-6">
                        <label for="city">City</label>
                        <input type="text" name="city" value  = "<?php echo $file['city'] ?>" id="city" class="form-control" placeholder="City" required>
                    </div>
                    <div class="col-6">
                        <label for="zip_code">Zip_Code</label>
                        <input type="number" name="zip_code" value  = "<?php echo $file['zip_code'] ?>" id="zip_code" class="form-control" placeholder="Zip_Code" required>
                    </div>
                    <div class="col-6">
                        <label for="price">Price</label>
                        <input type="number" name="price" value  = "<?php echo $file['price'] ?>" id="price" class="form-control" placeholder="Price" required>
                    </div>
                    <div class="col-6">
                      <label for="message">Description</label>
                      <textarea name="message" class="form-control" placeholder="Leave a comment here" id="message"><?php echo $file['reservation_message'] ?></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Modifier</button>
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

                    //UPDATE `advert` SET `id`='[value-1]',`title`='[value-2]',`description`='[value-3]',`zip_code`='[value-4]',`city`='[value-5]',`type`='[value-6]',`price`='[value-7]',`reservation_message`='[value-8]' WHERE 1
                    $link = $pdoCBS->prepare( "UPDATE advert SET title=:title, description=:description, zip_code=:zip_code, city=:city, type=:type,price=:price, reservation_message=:reservation_message WHERE id=:identity");
                    $link->execute(array(
                      ':title' => $_POST['title'],
                      ':description' => $_POST['description'],
                      ':zip_code' => $_POST['zip_code'],
                      ':city' => $_POST['city'],
                      ':type' => $_POST['type'],
                      ':price' => $_POST['price'],
                      ':reservation_message' => $_POST['message'],
                      ':identity' => $_GET['identity']
                    ));
                  }
            ?>
          </div>
        <!-- fin col -->
          
        <div class="col-4">
          <h2>mettre à jour les détails de votre annonce</h2>
          <div class="card" style="width: 18rem;">
            <!-- <img src="img/logo.png" class="card-img-top" alt="Photo"> -->
            <div class="card-body">
              <?php
                echo "<h5 class=\"card-title\">Title : " .$file['title']. "</h5>";
                echo "<p> ID : ".$file['id']. ", Type : " .$file['type']. "Price : ".$file['price']. " Code postal : ".$file['zip_code']. "<p>";
              ?>
              <a href="accueil.php" class="btn btn-primary">Go to Page</a>
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