<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/9/2016
 * Time: 11:28 PM
 */

namespace dennis\hw3\controllers;

include ('baseController.php');

use dennis\hw3 as H;



class defaultController extends baseController
{
    function __construct()
    {

    }

    public function maincontrol()
    {

        require_once('./src/views/mainView.php');
        $mainRender = new H\views\mainView();

        $mainRender->render(null);
    }
}