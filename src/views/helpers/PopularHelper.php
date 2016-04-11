<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 10:50 AM
 */

namespace dennis\hw3\views\helpers;
require_once("Helper.php");

class PopularHelper extends Helper
{
    public function render($data){

        $i=0;
        foreach($data as $row)
        {
            ?> <p> <?php
                echo($row[0]);
                echo(' ');
                echo($row[1]);
                echo(' ');
                echo($row[2]);
            ?> </p> <?php

            $i++;
            if ($i>=10){
                break;
            }
        }
    }
}