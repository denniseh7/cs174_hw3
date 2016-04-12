<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 10:43 PM
 */

namespace dennis\hw3\models;

require_once("Model.php");

class NewUserModel extends Model
{
    public function getData($data)
    {
        $config = include("../configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);



        $stmt=mysqli_prepare($con,"SELECT username FROM USER");

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt,$result);

        while(mysqli_stmt_fetch($stmt)){
            if ($data[0]==$result){
                return 1;
            }
        }

        $stmt=mysqli_prepare($con,"INSERT INTO USER Values(null,?,?)");
        mysqli_stmt_bind_param($stmt,"ss",$data[0],$data[1]);
        mysqli_stmt_execute($stmt);

        return 0;

    }
}