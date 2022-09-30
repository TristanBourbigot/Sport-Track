<?php

    require_once('ActivityDAO.php');
    require_once('Activity.php');
    require_once('UtilisateurDAO.php');
    require_once('User.php');

    $test = ActivityDAO::getInstance();
    $user1 = new User();
    $user1->init('LE ROUX', 'Erwan', '2002-07-18', 'HOMME', 169, 63, 'erwan@gwellan.net', 'password');

    $testUser = UtilisateurDAO::getInstance();
    $testUser1 = $testUser->insert($user1);

    $userId = $user1->getId();
    

    $act1 = new Activity();

    $act1->init($userId, 'IUT-RU', '2022-09-23');

    $test->insert($act1);
    $result = $test->findAll();
    $resultLgth = count($result);

    echo $resultLgth;
    echo "\n";

    for($i = 0; $i < $resultLgth; $i++){

        echo $result[$i];
        echo "\n";

    }

    echo "\n";

    $act1->setDescription('RU-IUT');

    $test->update($act1);
    $result = $test->findAll();
    $resultLgth = count($result);

    for($i = 0; $i < $resultLgth; $i++){

        echo $result[$i];
        echo "\n";

    }

    $test->delete($act1);
    $result = $test->findAll();
    $resultLgth = count($result);

    echo $resultLgth;

    $testUser -> delete($user1);
    $result = $test -> findAll();

    $resultLgth = count($result);

    echo $resultLgth;

?>