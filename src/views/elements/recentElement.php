<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/10/2016
 * Time: 3:07 AM
 */

namespace dennis\hw3\views\elements;

use dennis\hw3\views as V;

require_once('Element.php');

class recentElement extends Element
{
    public function render($data)
    {
        ?>
            <div>
                <h2>Recent</h2>
                <?php
                    require_once("./src/views/helpers/RecentHelper.php");
                $recent= new V\helpers\RecentHelper();
                $recent->render($data);
                ?>
            </div>
        <?php
    }
}