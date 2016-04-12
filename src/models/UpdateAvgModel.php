<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 8:07 AM
 */

namespace dennis\hw3\models;
require_once("Model.php");

class UpdateAvgModel extends Model
{
    public function update($rating,$imageID){

        $config = include("../configs/config.php");

        $check=0;
        $userID=$_SESSION['userID'];
        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        /*
        $stmt=mysqli_prepare($con,"SELECT imageID FROM imageRating WHERE userID=?");
        mysqli_stmt_bind_param($stmt,"d",$userID);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt,$result);

        while(mysqli_stmt_fetch($stmt)){
            if ($imageID==$result){
                    $check=1;
                    break;
                }
        }*/

        if ($check==0){
            $stmt=mysqli_prepare($con,"INSERT INTO imagerating VALUES(?,?,?)");
            mysqli_stmt_bind_param($stmt,"ddd",$userID,$imageID,$rating);
            mysqli_stmt_execute($stmt);

            $stmt=mysqli_prepare($con,"SELECT rating from imagerating WHERE imageID=?");
            mysqli_stmt_bind_param($stmt,"d",$imageID);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt,$result);

            $sum=0;
            $count=0;
            while(mysqli_stmt_fetch($stmt)){
                $sum=$sum+$result;
                $count++;
            }

            $avg=round(($sum/$count),1);

            $stmt=mysqli_prepare($con,"UPDATE Image SET average=? WHERE imageID=?");
            mysqli_stmt_bind_param($stmt,"dd",$avg,$imageID);
            mysqli_stmt_execute($stmt);
        }

        $stmt->close();
        $con->close();
    }
}