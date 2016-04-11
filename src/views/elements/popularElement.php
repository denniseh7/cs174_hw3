<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/10/2016
 * Time: 4:01 AM
 */

namespace dennis\hw3\views\elements;

require_once('Element.php');

class popularElement extends Element
{
    public function render($data)
    {
        ?>
            <div>
                <h2>Popular</h2>
                <?php  ?>
            </div>
        <?php
    }
}