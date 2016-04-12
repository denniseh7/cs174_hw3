<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 4:29 PM
 */

namespace dennis\hw3\views\elements;

use dennis\hw3\views as V;

require_once('Element.php');

class loggedRecentElement
{
    public function render($data)
    {
        ?>
        <div>
            <h2>Logged Recent</h2>
            <?php
            require_once("./src/views/helpers/RecentHelper.php");
            $recent= new V\helpers\RecentHelper();
            $recent->render($data);
            ?>
        </div>
        <?php
    }
}