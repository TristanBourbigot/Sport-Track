<?php

require_once 'UtilisateurDAO.php';
require_once 'User.php';

$pdo = SqliteConnection::getInstance()->getConnection();
$test = UtilisateurDAO::getInstance();
$user1 = new User();
$user1->init('LE ROUX', 'Erwan', '2002-07-18', 'HOMME', 169, 63, 'erwan@gwellan.net', 'password');

    $test->insert($user1);
    $result = $test->findAll();
    $resultLgth = count($result);

    echo $resultLgth;
    echo "\n";

    for($i = 0; $i < $resultLgth; $i++){

        echo $result[$i];
        echo "\n";

    }

    $test->delete($user1);

    $result = $test->findAll();
    $resultLgth = count($result);

    echo $resultLgth;

?>