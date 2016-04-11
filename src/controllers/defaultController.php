<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/9/2016
 * Time: 11:28 PM
 */

namespace dennis\hw3\controllers;

include('Controller.php');

use dennis\hw3 as H;



class defaultController extends Controller
{
    function __construct()
    {

    }

    public function maincontrol()
    {

        require_once('./src/views/mainView.php');
        $mainRender = new H\views\mainView();

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