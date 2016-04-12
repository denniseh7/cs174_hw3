<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 4:27 PM
 */

namespace dennis\hw3\views\elements;


class uploadImage extends Element
{
    public function render($data)
    {
        ?>
            <form action="./src/views/uploadView.php" method="post">
                <input type="submit" value="Upload Image" name="Upload">
            </form>
        <?php
    }
}