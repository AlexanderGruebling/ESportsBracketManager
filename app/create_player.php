<?php
/**
 * Created by PhpStorm.
 * User: agrue
 * Date: 04.03.2019
 * Time: 11:12
 */

use HTL3R\ESportsBracketManager\Player;

require_once "bootstrap.php";

$id = $argv[1];
$tid = $argv[2];
$firstname = $argv[3];
$lastname = $argv[4];
$username = $argv[5];
$email = $argv[6];

$player = new Player();
$player->setId($id);
$player->setTournamentId($tid);
$player->setFirstname($firstname);
$player->setLastname($lastname);
$player->setEmail($email);
$player->setUsername($username);

$entityManager->persist($player);
$entityManager->flush();

echo "Created Player with ID " . $player->getId() . "\n";

