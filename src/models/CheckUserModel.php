<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 3:30 PM
 */

namespace dennis\hw3\models;

require_once("Model.php");

class CheckUserModel extends Model
{
    public function getData($data)
    {
        $config = include("../configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);



        $stmt=mysqli_prepare($con,"SELECT userID FROM USER WHERE username=? AND password=?");
        mysqli_stmt_bind_param($stmt,"ss",$data[0],$data[1]);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt,$result);

        mysqli_stmt_fetch($stmt);

        return $result;

    }
}