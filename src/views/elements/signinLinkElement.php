<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 2:52 PM
 */

namespace dennis\hw3\views\elements;


class signinLinkElement extends Element
{
    public function render($data){
        ?>
            <a>SignIn</a>
            <a>SignUp</a>
        <?php
    }
}