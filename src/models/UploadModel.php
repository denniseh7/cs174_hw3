<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 5:10 PM
 */

namespace dennis\hw3\models;

require("Model.php");

class UploadModel extends Model
{
    public function insertdb($userid,$imagename, $caption){
        $config = include("../configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);



        $stmt=mysqli_prepare($con,"INSERT INTO IMAGE VALUES (null,?,?,0,?,?)");
        $curdate=date("Y-m-d H:i:s");
        mysqli_stmt_bind_param($stmt,"dsss",$userid,$imagename,$curdate,$caption);
        mysqli_stmt_execute($stmt);

        return true;
    }
}