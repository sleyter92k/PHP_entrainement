<?php

$base_BD = new PDO(
  'mysql:host=localhost;dbname=cbs_php_inter_mostapha', // hôte nom BDD
  'root', // pseudo 
  // '',// mot de passe
  '', // mdp pour MAC avec MAMP
  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // afficher les erreurs SQL dans le navigateur
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // charset des échanges avec la BDD
  )
);
// debug($pdoENT);
// debug(get_class_methods($pdoENT));
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update</title>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <!-- lin icon boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- custom css file link  -->
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css" />
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded " aria-label="Eleventh navbar example">
      <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#update.php">Page Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accueil.php">Page accueil</a>
          </li>
        </ul>
      
      </div>
    </div>
  </nav>
  <div class=" container">
    <div class="mx-auto  mb-3 text-center shadow p-3 mt-4 bg-white w-50 round">

      <h1> update</h1>
    </div>

    <?php if (isset($_GET['id'])) : ?>
      <?php $id = $_GET['id']; ?>

  </div>
  <br>
  <hr>
  <?php $connection = $base_BD;
      // contacte la base de donnée 
  ?>
  <?php $sql = "SELECT * FROM advert where id=:id"; ?>
  <?php $statement = $connection->prepare($sql); ?>
  <?php $statement->bindValue(":id", $id); ?>
  <?php $statement->execute(); ?>
  <?php $condidat = $statement->fetch(PDO::FETCH_ASSOC); ?>

  <?php if (isset($_POST['submit'])) : ?>
    <?php $condidat = array(
          'id' => $_POST['id'],
          'title' => $_POST['title'],
          'description' => $_POST['description'],
          'zip_code' => $_POST['zip_code'],
          'city' => $_POST['city'],
          'type' => $_POST['type'],
          'price' => $_POST['price'],
          'reservation_message' => $_POST['reservation_message'],
        );
    ?>

    <?php $connection = $base_BD;
        // contacte la base de donnée 
    ?>
    <?php $sql = "UPDATE advert SET title=:title, description=:description, zip_code=:zip_code,city=:city, type=:type, price=:price,reservation_message=:reservation_message  WHERE id=:id"; ?>
    <?php $statement = $connection->prepare($sql); ?>
    <?php $statement->execute($condidat); ?>

    <div class=" text-center mx-auto shadow p-3 mb-2 mt-4 bg-white w-50 round">
      <p class="alert alert-success" role="alert">Your have updated your annonce succesfully</p>
    </div>
    <br>
  <?php endif; ?>
  <div class="d-flex  justify-content-center">
    <h2 class=" text-center shadow p-3 mb-2 mt-4 bg-white w-50 round"> Consulter une unnoce</h2>
  </div>

  <div class="container w-50 mx-auto">

    <div class="row mt-5 mb-5   bg-gradient border-primary ">

      <form method="post" class=" shadow-lg p-3 mb-5 bg-white rounded   rounded-start rounded-bottom">>
        <?php foreach ($condidat as $key => $value) : ?>
          <?php
          if ($key == 'title') : ?>
            <div class="mt-3">
              <label for="description"><i class="fas fa-user-tie"></i> </label>
              <input type="<?php echo $key; ?>" name="title" value="<?php echo $value; ?>" id="nom" class="form-control" placeholder="nom">
            </div>
          <?php elseif ($key == 'description') : ?>
            <div class="mt-3">
              <label for="description"><i class="bi bi-envelope"></i></label>
              <textarea <?php echo $key; ?> name="description" id="description" class="form-control"><?php echo $value; ?></textarea>
            </div>
          <?php elseif ($key == 'zip_code') : ?>
            <div class="mt-3">
              <label for="prenom"><i class="bi bi-person-circle"></i> </label>
              <input type="<?php echo $key; ?>" name="zip_code" value="<?php echo $value; ?>" id="prenom" class="form-control">
            </div>

          <?php elseif ($key == 'city') : ?>

            <div class="mt-3">
              <label for="email"><i class="bi bi-envelope-open-fill"></i></label>
              <input type="<?php echo $key; ?>" name="city" value="<?php echo $value; ?>" id="email" class="form-control">
            </div>
          <?php elseif ($key == 'type') : ?>

            <div class="mb-3">
              <!-- https://getbootstrap.com/docs/5.1/forms/checks-radios/ -->
              <label for="sexe" class="form-label">type </label><br>
              <input type="radio" name="type" value="location" id="type" checked> location <br>
              <input type="radio" name="type" value="vente" <?php if (isset($key['type']) && $key['type'] == 'vente') echo ' checked'; //le 1er bouton sera checked et le second le sera SI on f depuis $fiche 
                                                            ?> id="type"> vente
            </div>
          <?php elseif ($key == 'price') : ?>

            <div class="mt-3">
              <label for="email"><i class="bi bi-envelope-open-fill"></i></label>
              <input type="<?php echo $key; ?>" name="price" value="<?php echo $value; ?>" id="email" class="form-control">
            </div>


          <?php elseif ($key == 'reservation_message') : ?>
            <div class="mt-3">
              <label for="confmdp"><i class="bi bi-envelope"></i></label>
              <textarea <?php echo $key; ?> name="reservation_message" id="reservation_message" class="form-control"><?php echo $value; ?></textarea>
            </div>

          <?php else : ?>

            <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?> " id="<?php echo $key; ?>" <?php if ($key == 'id') {
                                                                                                                    echo 'readonly';
                                                                                                                  } ?> <?php endif; ?> <br>
          <?php endforeach; ?>
          <button class="btn btn-outline-secondary bg-success" id="update" type="submit" name="submit" value="Update your idea"> je réserve</button>
      </form>
    </div>
  </div>

<?php endif; ?>

</div>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- <script src="dialogue.js"></script> -->
</body>

</html>