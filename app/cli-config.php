<?php
/**
 * Created by PhpStorm.
 * User: agrue
 * Date: 04.03.2019
 * Time: 10:57
 */

require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);