<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 10:37 AM
 */

namespace dennis\hw3\models;

require_once("Model.php");

class GetImageModel extends Model
{
    public function getData(){
        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $query='SELECT imagename,average,date,caption,username FROM Image,User WHERE Image.userID=User.userID ORDER BY average DESC';

        $result=mysqli_query($con,$query);

        return $result;
    }
}