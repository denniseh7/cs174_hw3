<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/10/2016
 * Time: 1:44 AM
 */

namespace dennis\hw3\controllers;
use dennis\hw3 as H;

require_once('Controller.php');

class loggedinController extends Controller
{
    public function maincontrol(){

        require_once('./src/views/loggedInView.php');
        $mainRender = new H\views\LoggedInView();

        require_once('./src/models/GetImageModel.php');
        $imagedata = new H\models\GetImageModel();
        $data=$imagedata->getData();
        $arr=array();
        while($row=mysqli_fetch_array($data))
        {
            $arr[]=$row;
        }

        $mainRender->render($arr);
    }
}