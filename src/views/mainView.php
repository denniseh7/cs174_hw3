<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/9/2016
 * Time: 11:54 PM
 */

namespace dennis\hw3\views;
use dennis\hw3\views\elements as E;

require_once('baseView.php');

class mainView extends baseView
{
    public function render($data){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Dennis's Image Rating</title>
        <body>
            <?php

                require_once("elements/headingElement.php");
                $heading = new E\headingElement();
                $heading->render(null);
            ?>
        </body>
        </html>
        <?php
    }
}