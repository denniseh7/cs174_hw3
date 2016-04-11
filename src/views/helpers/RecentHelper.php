<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 11:23 AM
 */

namespace dennis\hw3\views\helpers;


class RecentHelper
{
    public function render($data){

        //sort by date
        foreach ($data as $key=> $row) {
            $sort_col[$key] = $row[2];//date is column [2]
        }
        array_multisort($sort_col,SORT_DESC,$data);

        $i=0;
        foreach($data as $row)
        {
            $image="./src/resources/".$row[0];
            ?> <img src="<?php
            echo($image); ?>"></img><p>Caption: <?php
            echo($row[3].' Rating '.$row[1].'User: '.$row[4].' Date: '.$row[2]);
            ?> </p> <?php

            $i++;
            if ($i>=3){
                break;
            }
        }
    }
}