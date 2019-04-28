<?php

/**
 * Created by PhpStorm.
 * User: agrue
 * Date: 04.03.2019
 * Time: 11:12
 */

use HTL3R\ESportsBracketManager\Tournament;

require_once "bootstrap.php";

$id = $argv[1];
$tournamentName = $argv[2];

$tournament = new Tournament();
$tournament->setId($id);
$tournament->setTournamentName($tournamentName);

$entityManager->persist($tournament);
$entityManager->flush();

echo "Created Tournament with ID " . $tournament->getId() . "\n";


