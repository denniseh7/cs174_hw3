<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 8:07 AM
 */

namespace cs174_hw3\src\models;
require_once("Model.php");

class UpdateAvgModel extends Model
{
    public function update($imageID){
        $config=include("src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['cs174hw3']);

        $query = 'INSERT INTO ImageRating  ';
        $query = 'SELECT AVG(rating) FROM ImageRating GROUP BY imageID';

        $result=mysqli_query($con,$query);



        $updatequery= 'UPDATE Image SET average=? WHERE imageID=?';

        $stmt = mysqli_stmt_init($con);

       // mysqli_stmt_bind_param($stmt,"ss",$row[1],$row[0]);



    }
}