<?php
/**
 *Dennis Hsu
 *CS 174 Homework 3
 * Index.php Page for User
 */

namespace dennis\hw3;



use dennis\hw3\controllers\mainController;

require_once("./src/controllers/mainController.php");

$main = new mainController();

$main->maincontrol();

