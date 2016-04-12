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
        foreach($data as $row) {
            $imagename = "./src/resources/" . $row[0];
            $image = imagecreatefromjpeg($imagename);

            //check exif data for orientation and change
            $exif = exif_read_data($imagename);
            if (!empty($exif['Orientation'])) {
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
            if ($width !=500){
                $newwidth = 500;
                $newheight = $height * 500 / $width;

                $src = $image;
                $dst = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagejpeg($dst, $imagename);//write new size and orientation image to file
            }

            ?> <img src=<?php echo($imagename); ?>><p>Caption: <?php
            echo($row[3].' Rating '.$row[1].' Uploader: '.$row[4].' Date: '.$row[2]);

            ?></p><?php

            //stop after 3 images
            $i++;
            if ($i>=3){
                break;
            }
        }

    }
}