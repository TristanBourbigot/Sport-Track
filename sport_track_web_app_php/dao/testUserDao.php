<?php

require_once 'UtilisateurDAO.php';
require_once 'User.php';

$test = UtilisateurDAO::getInstance();

    $test->insert(new User(1, "test", "test", "test", "test", "test", "test", "test", "test"));
    $test->insert(new User(2, "ratio", "ratio", "ratio", "ratio", "ratio", "ratio", "ratio", "ratio"));
    $test->insert(new User(3, "test", "moai", "moai", "moai", "moai", "moai", "moai", "moai"));

?>