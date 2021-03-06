<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/9/2016
 * Time: 11:54 PM
 */

namespace dennis\hw3\views;
use dennis\hw3\views\elements as E;

require_once('View.php');

class mainView extends View
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

                require_once("elements/signinLinkElement.php");
                $signinlink = new E\signinLinkElement();
                $signinlink->render(null);

                require_once("elements/recentElement.php");
                $recent = new E\recentElement();
                $recent->render($data);

                require_once("elements/popularElement.php");
                $popular = new E\popularElement();
                $popular->render($data);
            ?>
        </body>
        </html>
        <?php
    }
}