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
        <!-- Chargement de la NavBar-->
        <?php require_once 'inc/nav.inc.php'; ?>

    </header>
    <!-- fin container-fluid header  -->

    <div class="container bg-white">

        <!-- début row -->
        <section class="row">

            <div class="col-md-12 mt-5">
                <h2 class="text-center mb-5">Liste des annonces de l'agence Le bon Appart</h2>

                <?php
                // Requete SQL pour réccupérer les 15 annonces récentes
                $resultat = $pdoIMM->query("SELECT * FROM advert ORDER BY id DESC LIMIT 15");
                $resultat->execute();
                ?>

                <table class="table table-dark table-hover table-striped">
                    <thead class="">
                        <tr>
                            <th class="text-center" style="background-color: darkorange; color: black">Id</th>
                            <th class="text-center">Titre</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Code postal</th>
                            <th class="text-center">Ville</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Prix</th>
                            <th class="text-center">Réservation annonce</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($annonce = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td class="text-center"><?php echo $annonce['id'] ?></td>
                                <td class="text-center"><?php echo strtoupper($annonce['title']) ?></td>
                                <td class="text-center"><?php echo $annonce['description'] ?></td>
                                <td class="text-center"><?php echo $annonce['zip_code'] ?></td>
                                <td class="text-center"><?php echo $annonce['city'] ?></td>
                                <td class="text-center"><?php echo $annonce['type'] ?></td>
                                <td class="text-center"><?php echo $annonce['price'] ?></td>

                                <!-- Si une annonce est réservée on affiche le texte correspondant -->
                                <td class="text-center"><?php
                                                        if ($annonce['reservation_message'] !== null) {
                                                            echo "Annonce réservée";
                                                        } else {
                                                            echo "Annonce non réservée";
                                                        } ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- fin col -->
        </section>
        <!-- fin row -->
    </div>
    <!-- fin container  -->

    <!-- footer en require  -->
    <?php require_once 'inc/footer.inc.php'; ?>

</body>

</html>