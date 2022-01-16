<?php

$dsn = "mysql:host=$host:$port;dbname=$database";

// Retourne une instance de PDO. La signature de la fonction getInstancePDO implique que l'objet doit être nécessairement de type PDO
// Sinon une erreur sera levée
function getInstancePDO(string $dsn, string $user, string $password): PDO
{
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');

        return $pdo;
    } catch (PDOException $e) {
        echo "Problème de connection à la BDD: " . $e->getMessage();
        // On arrête le script (car la connection bdd ne s'est pas faite) avec un die() pour ne pas que le script puisse exécuter les lignes de code suivants dans le fichier d'appel (07_exo_pdo.php)
        die();
    }
}
