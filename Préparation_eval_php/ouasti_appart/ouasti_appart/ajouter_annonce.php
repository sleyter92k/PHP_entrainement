<?php
require_once 'inc/functions.php';

$host = 'localhost';
$port = 3306;
$database = 'cbs_php_inter_rachid';
$user = 'root';
$password = '';


// Connection à la base de donnée entreprise
require_once 'inc/connectionBDD.php';
$pdoIMM = getInstancePDO($dsn, $user, $password);

// Traitement du formulaire
if (!empty($_POST)) {
    // var_dump($_POST);
    $_POST['title'] = htmlspecialchars($_POST['title']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['zip_code'] = htmlspecialchars($_POST['zip_code']);
    $_POST['city'] = htmlspecialchars($_POST['city']);
    $_POST['type'] = htmlspecialchars($_POST['type']);
    $_POST['price'] = htmlspecialchars($_POST['price']);

    $insertion = $pdoIMM->prepare(" INSERT INTO advert (title, description, zip_code, city, type, price) VALUES (:title, :description, :zip_code, :city, :type, :price) ");

    $insertion->execute(array(
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':zip_code' => $_POST['zip_code'],
        ':city' => $_POST['city'],
        ':type' => $_POST['type'],
        ':price' => $_POST['price'],
    ));
}

// var_dump($pdoIMM);

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Le Bon Appart</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header class="container-fluid">
        <h1 class="display-4 text-center">Agence immobilière - Le Bon Appart</h1>
        <?php require_once 'inc/nav.inc.php'; ?>

    </header>
    <!-- fin container-fluid header  -->

    <div class="container bg-white">

        <section class="row">

            <div class="col-md-12 mt-5">
                <h2 class="text-center mb-5">Liste des annonces de l'agence Le bon Appart</h2>
            </div>

            <div class="col-md-12 mt-3 mb-3 px-5">
                <h2 class="text-center mb-5">Ajout d'une annonce</h2>
                
                <!-- Début formulaire ajouter une annonce -->
                <form class="was-validated bg-dark text-white" action="accueil.php" method="POST">

                    <div class="mb-3">
                        <label for="title" class="form-label">Titre de l'annonce</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                        <div class="valid-feedback">Titre de l'annonce rempli</div>
                        <div class="invalid-feedback">Titre de l'annonce non rempli.</div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description de l'annonce</label>
                        <input type="text" name="description" class="form-control" id="description" required>
                        <div class="valid-feedback">Description rempli</div>
                        <div class="invalid-feedback">Description non rempli.</div>
                    </div>

                    <div class="mb-3">
                        <label for="zip_code" class="form-label">Code postal</label>
                        <input type="text" name="zip_code" class="form-control" id="zip_code" required>
                        <div class="valid-feedback">Code postal rempli</div>
                        <div class="invalid-feedback">Code postal non rempli.</div>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Ville</label>
                        <input type="text" name="city" class="form-control" id="city" required>
                        <div class="valid-feedback">Ville rempli</div>
                        <div class="invalid-feedback">Ville non rempli.</div>
                    </div>
   
                    <div class="form-check">
                        <label class="form-check-label" for="type">Location</label>
                        <input class="form-check-input" type="radio" name="type" id="type" value="location" checked>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="type">Vente</label>
                        <input class="form-check-input" type="radio" name="type" id="type" value="vente">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="text" name="price" class="form-control" id="price" required>
                        <div class="valid-feedback">Prix rempli</div>
                        <div class="invalid-feedback">Prix non rempli.</div>
                    </div>

               <div class="text-center align-center mb-3">
                        <button type="submit" class="btn btn-primary">Créer une nouvelle annonce</button>
                    </div>
                </form>
            <!-- fin formulaire ajouter une annonce -->

            </div>
            <!-- fin col -->

            <?php

            // if (isset($_POST['pseudo']) && isset($_POST['message'])) {
            //     $message = $_POST['message'];
            //     $pseudo = $_POST['pseudo'];

            //     $sql = "INSERT INTO commentaires (`pseudo`, `message`, `date_enregistrement`) VALUES ('$pseudo', '$message', NOW())";
            //     try {
            //         $pdoENT->exec($sql);
            //         $_SESSION['valider'] = 'ok';
            //     } catch (PDOException $pdo) {
            //         echo $e->getMessage();
            //     }
            // }
            // // var_dump($_POST);
            // // var_dump($_SESSION);
            // if (!empty($_SESSION['valider'] == 'ok')) {
            //     echo '<div class="alert alert-success w-25 mx-auto text-center" role="alert">Formulaire validé avec succès</div>';
            // }
            ?>
        </section>
        <!-- fin row -->



    </div>
    <!-- fin container  -->


    <!-- footer en require  -->
    <?php require_once 'inc/footer.inc.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

</body>

</html>