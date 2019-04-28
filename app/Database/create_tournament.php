<?php

/**
 * Created by PhpStorm.
 * User: agrue
 * Date: 04.03.2019
 * Time: 11:12
 */

use HTL3R\ESportsBracketManager\Tournament;
use Doctrine\ORM\Tools\Setup;

require_once "bootstrap.php";
require_once "vendor/autoload.php";
require "Database/UserCredentialsDB.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"), $isDevMode);

$productRepository = $entityManager->getRepository('HTL3R\ESportsBracketManager\Tournament');
$GLOBALS['tournaments'] = $productRepository->findAll();

if(isset($_GET['tournamentName'])){
    $id = sizeof($GLOBALS['tournaments']);
    $tournamentName = $_GET['tournamentName'];
    $tournament = new Tournament();
    $tournament->setId($id);
    $tournament->setTournamentName($tournamentName);

    try {
        $entityManager->persist($tournament);
        $entityManager->flush();
        echo "Created Tournament with ID " . $tournament->getId() . "\n";
    } catch (\Doctrine\ORM\ORMException $e) {
        echo "Failed!";
    }
}




