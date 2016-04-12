<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 8:14 PM
 */

namespace dennis\hw3\models;

use dennis\hw3 as H;

require_once("Model.php");

class GetRatedModel extends Model
{
    public function getData(){

        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $userID=$_SESSION['userID'];


        $stmt=mysqli_prepare($con,"SELECT imageID FROM imagerating WHERE userID=?");
        mysqli_stmt_bind_param($stmt,"d",$userID);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt,$result);
        while(mysqli_stmt_fetch($stmt)){
            $rated[]=$result;
        }

        if(empty($rated)){
          return null;
        } else {
            return $rated;
        }
    }
}