<?php
    require_once('ActivityEntryDAO.php');
    require_once('ActivityDAO.php');
    require_once('UtilisateurDAO.php');
    require_once('Activity.php');
    require_once('Data.php');
    require_once('User.php');


    $test = ActivityEntryDAO::getInstance();
    $testActivity = ActivityDAO::getInstance();
    $testUser = UtilisateurDAO::getInstance();

    $user1 = new User();
    $user1->init('LE ROUX', 'Erwan', '2002-07-18', 'HOMME', 169, 63, 'erwan@gwellan.net', 'password');
    $testUser1 = $testUser->insert($user1);
    $userId = $user1->getId();

    $act1 = new Activity();
    $act1->init($userId, 'IUT-RU', '2022-09-23');
    $testActivity1 = $testActivity->insert($act1);
    $actId = $act1->getIdActivity();

    $data1 = new Data();
    $data1->init($actId,'13:00:00', 95, 1400.0, 1300.0, 300,0);
    
    echo $data1->getTime();

    $testData1 = $test->insert($data1);
    $result = $test->findAll();
    $resultLgth = count($result);

    echo $resultLgth;

    for($i = 0; $i < $resultLgth; $i++){

        echo $result[$i];
        echo "\n";

    }

    echo "\n";

    $data1->setLattitude(1500.0);

    $test->update($data1);

    $result = $test->findAll();
    $resultLgth = count($result);

    for($i = 0; $i < $resultLgth; $i++){

        echo $result[$i];
        echo "\n";

    }

    $test->delete($data1);
    $result = $test->findAll();
    $resultLgth = count($result);



?>

