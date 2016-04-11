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

            //check exif data for orientation
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

            imagejpeg($image,$imagename);


            ?> <img src="<?php
            echo($imagename); ?>"></img><p>Caption: <?php
            echo($row[3].' Rating '.$row[1].'User: '.$row[4].' Date: '.$row[2]);

            ?></p><?php

            $i++;
            if ($i>=10){
                break;
            }
        }
    }

    public function resize($filename){
        header('Content-Type: image/jpeg');

        list($width, $height) = getimagesize($filename);

        if($width != 500) {
            $new_width = 500;
            $new_height = $height*500/$width;
            $image_p = imagecreatetruecolor($new_width, $new_height);
            $image=$image = imagecreatefromjpeg($filename);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        }
    }
}