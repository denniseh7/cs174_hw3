<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 7:45 PM
 */

namespace dennis\hw3\views\helpers;

require_once("Helper.php");

class LoggedPopularHelper extends Helper
{
    public function render($data){}

    public function renderlogged($data, $rated)
    {
        $i = 0;
        foreach ($data as $row) {
            $imagename = "./src/resources/" . $row[0];
            $image = imagecreatefromjpeg($imagename);

            //check exif data for orientation and change for INITIAL Database jpeg(new uploads will not use this)
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

            //change size for INITIAL Database Jpeg(new uploads will not use this)
            list($width, $height) = getimagesize($imagename);
            if ($width != 500) {
                $newwidth = 500;
                $newheight = $height * 500 / $width;

                $src = $image;
                $dst = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagejpeg($dst, $imagename);//write new size and orientation image to file
            }

            ?> <img src="<?php
            echo($imagename); ?>"></img><div>Caption: <?php
                echo($row[3] . '   Average Rating: ' . $row[1] . '      Uploader: ' . $row[4] . '   Date: ' . $row[2]);
                $imagetest=$row[5];


            if ($rated==null || !in_array($imagetest,$rated))
            {
                ?>
                <form name="recentRate" id="recentRate" action="./src/controllers/rateController.php" method="post">
                    <input type="hidden" name="imagechosen" value= <?php echo $imagetest ?>/>
                    <select name="rateView" id="rateView">
                        <option value=5>5</option>
                        <option value=4>4</option>
                        <option value=3>3</option>
                        <option value=2>2</option>
                        <option value=1>1</option>
                    </select>
                    <input type="submit" value="Rate"/>
                </form>
                <?php
            }
            ?></div><?php

            //stop after 3 images
            $i++;
            if ($i >= 10) {
                break;
            }
        }

    }
}