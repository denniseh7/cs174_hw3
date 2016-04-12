<?php
/**
 *Dennis Hsu
 *CS 174 Homework 3
 * Index.php Page for User
 */

namespace dennis\hw3;

session_start();

use dennis\hw3\controllers as C;


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && $_SESSION['userID']!=null) {
    require_once("./src/controllers/loggedinController.php");
    $main = new C\loggedinController();
    $main->maincontrol();
} else {
    require_once("./src/controllers/defaultController.php");
    $main = new C\defaultController();

    $main->maincontrol();
}

