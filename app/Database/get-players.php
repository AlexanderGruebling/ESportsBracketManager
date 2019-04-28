<?php
/*use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;*/

use Doctrine\ORM\Tools\Setup;

require_once "../vendor/autoload.php";
require_once "../bootstrap.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

require "../Database/UserCredentialsDB.php";

// database configuration parameters
/*$conn = array(
    'driver' => 'pdo_sqlite',
'path' => __DIR__ . '/db.sqlite',
);*/
if(isset($_GET['tournament'])){
    $productRepository = $entityManager->getRepository('HTL3R\ESportsBracketManager\Player');
    $GLOBALS['players'] = $productRepository->findBy(array('tournamentId' => (int) $_GET['tournament']));
}else{
    $productRepository = $entityManager->getRepository('HTL3R\ESportsBracketManager\Player');
    $GLOBALS['players'] = $productRepository->findBy(array('tournamentId' => 0));
}

header('Content-type: application/json');
if(sizeof($GLOBALS['players']) === 8 ||
    sizeof($GLOBALS['players']) === 16 ||
    sizeof($GLOBALS['players']) === 32 ||
    sizeof($GLOBALS['players']) === 64){
    shuffle($GLOBALS['players']);
    echo json_encode($GLOBALS['players']);
}else{
    echo json_encode('Playercount does not match 8, 16, 32 or 64!');
}


/*foreach ($GLOBALS['players'] as $product) {
    echo sprintf("-%s\n", $product->getFirstName());
}*/

/*
$return = [];

if(sizeof($GLOBALS['players']) % 2 === 0){
    shuffle($GLOBALS['players']);
    //echo '<div layout="column" layout-align="center center">';
    for($i = 0; $i < sizeof($GLOBALS['players']); $i = $i + 2){
        echo '<player name="'.$GLOBALS['players'][$i]->getUsername().'"></player>';
        echo 'vs.';
        echo '<player name="'.$GLOBALS['players'][$i + 1]->getUsername().'" style="margin-bottom: 25px;"></player>';

    }
    //echo '</div>';

}else{
    echo 'Failed';
}
*/
