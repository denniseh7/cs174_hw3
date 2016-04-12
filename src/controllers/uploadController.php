<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 4:40 PM
 */

namespace dennis\hw3\controllers;

use dennis\hw3\models\UploadModel;

require_once("Controller.php");

class uploadController extends Controller
{
    public function maincontrol()
    {
        session_start();
        echo($_SESSION['userID']);
        $dir = "../resources/";
        echo($_FILES["fileToUpload"]["tmp_name"]);
        $basefile=basename($_FILES["fileToUpload"]["name"]);
        $filelocation = $dir.$basefile;


        $allowedType=IMAGETYPE_JPEG;
        $detectedType = exif_imagetype($_FILES['fileToUpload']["tmp_name"]);
        echo($detectedType);

        if($detectedType != $allowedType){
            require("../views/uploadView.php");
            ?><div>Must enter an jpeg image file</div><?php
        } else if (file_exists($filelocation)) {
            require("../views/uploadView.php");
            ?><div>Must enter an jpeg image file or already exists </div><?php
        } else {
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $filelocation)) {
                $caption = filter_input(INPUT_POST, 'caption', FILTER_SANITIZE_STRING);
                require("../models/UploadModel.php");
                $updatedb = new UploadModel();
                $success = $updatedb->insertdb($_SESSION['userID'], $basefile, $caption);
                if ($success) {

                    require("../views/uploadView.php");
                    ?>
                    <div>Successful Upload</div><?php
                } else {
                    require("../views/uploadView.php");
                    ?>
                    <div>Error:Unsuccessful Database Update</div><?php
                }
            } else {
                require("../views/uploadView.php");
                ?><div>Error:Unsuccessful Upload</div><?php
            }
        }

    }
}

$uController=new uploadController();
$uController->maincontrol();