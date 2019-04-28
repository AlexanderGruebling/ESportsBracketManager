<?php
/**
 * Created by PhpStorm.
 * User: agrue
 * Date: 04.03.2019
 * Time: 11:12
 */

use HTL3R\ESportsBracketManager\Player;

require_once "bootstrap.php";

if(isset($_GET['uname']) && isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['email']) && isset($_GET['tid']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $tid = $_GET['tid'];
    $firstname = $_GET['fname'];
    $lastname = $_GET['lname'];
    $username = $_GET['uname'];
    $email = $_GET['email'];

    $player = new Player();
    $player->setId($id);
    $player->setTournamentId($tid);
    $player->setFirstname($firstname);
    $player->setLastname($lastname);
    $player->setEmail($email);
    $player->setUsername($username);

    $entityManager->persist($player);
    $entityManager->flush();

    echo json_encode([
        'Created' => true,
        'Username' => $player->getUsername(),
        'ID' => $player->getId()
    ]);
}