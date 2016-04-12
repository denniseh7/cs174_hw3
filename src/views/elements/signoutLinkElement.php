<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 6:19 PM
 */

namespace dennis\hw3\views\elements;


class signoutLinkElement extends Element
{
    public function render($data){
        ?>
        <a href="./src/controllers/SignOutController.php">Signout</a>
        <?php
    }
}