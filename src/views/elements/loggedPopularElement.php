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

class loggedPopularElement extends Element
{
    public function render($data){}
    public function renderlogged($data,$rated)
    {
        ?>
        <div>
            <h2>Popular</h2>
            <?php
            require_once("./src/views/helpers/LoggedPopularHelper.php");
            $recent= new V\helpers\LoggedPopularHelper();
            $recent->renderlogged($data,$rated);
            ?>
        </div>
        <?php
    }
}