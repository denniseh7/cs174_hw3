<?php
/**
 *Dennis Hsu
 *CS 174 Homework 3
 * Index.php Page for User
 */

namespace dennis\hw3;

$logged=false;

use dennis\hw3\controllers as C;

if ($logged) {
    require_once("./src/controllers/defaultController.php");

    $main = new C\defaultController();

    $main->maincontrol();
} else {
    $main = new C\loggedController();

    $main->maincontrol();
}

