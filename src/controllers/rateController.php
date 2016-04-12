<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 9:20 PM
 */

namespace dennis\hw3\controllers;

use dennis\hw3 as H;

require_once("Controller.php");

class rateController extends Controller{

    public function maincontrol()
    {
        session_start();
        if(!empty($_POST)){
            $rating=filter_input(INPUT_POST,'rateView');
            $imageID=filter_input(INPUT_POST,'imagechosen');
            require("../models/UpdateAvgModel.php");

            $update=new H\models\UpdateAvgModel();
            $update->update($rating, $imageID);

            header("Location: ../../index.php");
            exit;
        }
    }
}

$rateControl= new rateController();
$rateControl->maincontrol();