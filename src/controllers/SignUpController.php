<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 10:35 PM
 */

namespace dennis\hw3\controllers;

use dennis\hw3 as H;

require_once("Controller.php");

class SignUpController extends Controller
{
    public function maincontrol()
    {
        session_start();
        session_unset();
        if(!empty($_POST)){
            $data[0]=filter_input(INPUT_POST,'uname',FILTER_SANITIZE_STRING);//sanitize string here
            $data[1]=filter_input(INPUT_POST,'pwd',FILTER_SANITIZE_STRING);//sanitize string here
            $data[2]=filter_input(INPUT_POST,'pwd2',FILTER_SANITIZE_STRING);

            if($data[1]==$data[2]){
                require_once("../models/NewUserModel.php");
                $check = new H\models\NewUserModel();
                $output=$check->getData($data);

                if ($output !=0){
                    $_SESSION['signup']=1;
                    header("Location: ../views/SignUpView.php");
                } else {
                    header("Location: ../views/SignInView.php");
                    exit;
                }
            }else {
                $_SESSION['signup']=1;
                header("Location: ../views/SignUpView.php");
            }

        } else {
            $_SESSION['signup']=1;
            header("../views/SignUpView.php");
        }

    }
}

$signControl = new SignUpController();
$signControl->maincontrol();