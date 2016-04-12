<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 3:25 PM
 */

namespace dennis\hw3\controllers;

use dennis\hw3 as H;

require_once("Controller.php");

class SignInController extends Controller
{
    public function maincontrol()
    {
        session_start();
        session_unset();
        if(!empty($_POST)){
            $data[0]=filter_input(INPUT_POST,'uname',FILTER_SANITIZE_STRING);//sanitize string here
            $data[1]=filter_input(INPUT_POST,'pwd',FILTER_SANITIZE_STRING);//sanitize string here

            require_once("../models/CheckUserModel.php");
            $check = new H\models\CheckUserModel();
            $output=$check->getData($data);


            if(!empty($output)){
                $_SESSION['loggedin']=true;
                $_SESSION['userID']=$output;
                header("Location: ../../index.php");
                exit;
            }else {
                $_SESSION['signin']=1;
                header("Location: ../views/SignInView.php");
            }
        } else {
            $_SESSION['signin']=1;
            header("../views/SignInView.php");
        }

    }
}

$signControl = new SignInController();
$signControl->maincontrol();
