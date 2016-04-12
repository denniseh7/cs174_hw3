<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 6:22 PM
 */

namespace dennis\hw3\controllers;


require_once("Controller.php");

class signoutController extends Controller
{
    public function maincontrol()
    {
        session_start();

        session_unset();
        header("Location: ../../index.php");
        exit;
    }
}

$signout= new signoutController();
$signout->maincontrol();