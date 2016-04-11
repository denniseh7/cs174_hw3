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
            $imagename="./src/resources/".$row[0];
            $image=imagecreatefromjpeg($imagename);

            //check exif data for orientation and change
            $exif=exif_read_data($imagename);
            if(!empty($exif['Orientation'])) {
                switch ($exif['Orientation']) {
                    case 8:
                        $image = imagerotate($image, 90, 0);
                        break;
                    case 3:
                        $image = imagerotate($image, 180, 0);
                        break;
                    case 6:
                        $image = imagerotate($image, -90, 0);
                        break;
                }
            }

            //change size
            list($width, $height) = getimagesize($imagename);
            $newwidth = 500;
            $newheight = $height*500/$width;

            $src = $image;
            $dst = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            imagejpeg($dst,$imagename);//write new size and orientation image to file


            ?> <img src="<?php
            echo($imagename); ?>"></img><p>Caption: <?php
            echo($row[3].' Rating '.$row[1].'User: '.$row[4].' Date: '.$row[2]);

            ?></p><?php

            //stop after 10 images
            $i++;
            if ($i>=10){
                break;
            }
        }
    }

}