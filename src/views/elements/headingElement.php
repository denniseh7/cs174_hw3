<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/9/2016
 * Time: 11:50 PM
 */

namespace dennis\hw3\views\elements;

require_once('Element.php');

class headingElement extends Element
{
    public function render($data){
        ?> <h1>Image Rating</h1> <?php
    }
}