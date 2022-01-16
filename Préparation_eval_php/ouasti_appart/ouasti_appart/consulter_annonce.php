<?php
require_once 'inc/functions.php';

$host = 'localhost';
$port = 3306;
$database = 'cbs_php_inter_rachid';
$user = 'root';
$password = '';


// Connection à la base de donnée 
require_once 'inc/connectionBDD.php';
$pdoIMM = getInstancePDO($dsn, $user, $password);

// Réception des informations avec $_GET
// var_dump($_GET);

// on demande le détail d'une annonce cbs_php_inter_rachid
if (isset($_GET['id'])) {
    // var_dump($_GET['id']);

    $resultat = $pdoIMM->prepare(" SELECT * FROM advert WHERE id = :id ");
    $resultat->execute(array(
        // On associe le marqueur vide à l'id
        ':id' => $_GET['id']
    ));

    // var_dump($resultat->rowCount());

    // si le rowCount est égal à 0 c'est qu'il n'y a pas d'annonce
    if ($resultat->rowCount() == 0) {
        header('location: consulter_les_annonces.php');
        // arrêt du script
        exit();
    }
    $annonce = $resultat->fetch(PDO::FETCH_ASSOC);
} else {
    // Si j'arrive sur la page sans rien dans l'url
    header('location: consulter_les_annonces.php');
    exit();
}
var_dump($_GET['id']);
// var_dump($_POST['reservation_message']);

// Traitement du formulaire
if (!empty($_POST)) {

    $_POST['reservation_message'] = htmlspecialchars($_POST['reservation_message']);
    var_dump($_POST['reservation_message']);
    $insertion = $pdoIMM->prepare(" UPDATE advert SET reservation_message = :reservation_message WHERE id = :id ");

    $insertion->execute(array(
        ':reservation_message' => $_POST['reservation_message'],
        ':id' => $_GET['id']
    ));

    header('location: consulter_les_annonces.php');
    exit();
}

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
                <h2 class="text-center mb-5">Consultation d'une annonce de l'agence Le bon Appart</h2>

                <?php
                // $resultat = $pdoIMM->query("SELECT * FROM advert ORDER BY id DESC LIMIT 15");
                // $resultat->execute();
                // $nbr_employes = $resultat->rowCount();
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
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //while ($annonce = $resultat->fetch(PDO::FETCH_ASSOC)) { 
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $annonce['id'] ?></td>
                            <td class="text-center"><?php echo strtoupper($annonce['title']) ?></td>
                            <td class="text-center"><?php echo $annonce['description'] ?></td>
                            <td class="text-center"><?php echo $annonce['zip_code'] ?></td>
                            <td class="text-center"><?php echo $annonce['city'] ?></td>
                            <td class="text-center"><?php echo $annonce['type'] ?></td>
                            <td class="text-center"><?php echo $annonce['price'] ?></td>
                            <td class="text-center"><?php echo $annonce['reservation_message'] ?></td>
                            <!-- <td class="text-center"><a class="btn btn-warning align-center" href="03_fiche_employe.php?id_employes=<? //php echo $employe['id_employes']; 
                                                                                                                                        ?>">Fiche</a></button></td> -->
                        </tr>
                        <?php //} 
                        ?>
                    </tbody>
                </table>

                <!-- Début formulaire ajouter une annonce -->
                <form class="was-validated bg-dark text-white col-md-6 mt-5 mx-auto" action="" method="POST">

                    <div class="mb-3">
                        <label for="reservation_message" class="form-label">Saisissez un message afin d'être recontacté</label>
                        <textarea class="form-control" name="reservation_message" id="reservation_message" placeholder="Message requis" cols="50" rows="10" required></textarea>
                        <div class="invalid-feedback">
                            Merci d'écrire votre message ici et de cliquer sur le bouton "Je réserve"
                        </div>
                        <div class="valid-feedback">
                            Message rempli
                        </div>
                    </div>

                    <div class="text-center align-center mb-3">
                        <button type="submit" class="btn btn-primary" value="reservation">Je réserve</button>
                    </div>
                </form>
                <!-- fin formulaire ajouter une annonce -->
            </div>
    </div>
    <!-- fin col -->

    <?php
    $_SESSION['valider'] = '';
    // var_dump($_SESSION);
    if (isset($_POST['pseudo']) && isset($_POST['message'])) {
        $message = $_POST['message'];
        $pseudo = $_POST['pseudo'];

        $sql = "INSERT INTO commentaires (`pseudo`, `message`, `date_enregistrement`) VALUES ('$pseudo', '$message', NOW())";
        try {
            $pdoENT->exec($sql);
            $_SESSION['valider'] = 'ok';
        } catch (PDOException $pdo) {
            echo $e->getMessage();
        }
    }
    // var_dump($_POST);
    // var_dump($_SESSION);
    if (!empty($_SESSION['valider'] == 'ok')) {
        echo '<div class="alert alert-success w-25 mx-auto text-center" role="alert">Formulaire validé avec succès</div>';
    }
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