<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/10/2016
 * Time: 1:44 AM
 */

namespace dennis\hw3\controllers;

require_once('Controller.php');

class loggedinController extends Controller
{
    public function maincontrol(){

        session_start();

        require_once('./src/views/mainView.php');
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