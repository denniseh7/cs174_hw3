<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 4:24 PM
 */

namespace dennis\hw3\views;


namespace dennis\hw3\views;
use dennis\hw3\views\elements as E;

require_once('View.php');

class LoggedInView extends View
{
    public function render($data){

    }

    public function renderlogged($data,$rated){

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

        require_once("elements/uploadImage.php");
        $upload = new E\uploadImage();
        $upload->render($_SESSION['userID']);

        require_once("elements/signoutLinkElement.php");
        $signinlink = new E\signoutLinkElement();
        $signinlink->render(null);

        require_once("elements/loggedRecentElement.php");
        $recent = new E\loggedRecentElement();
        $recent->renderlogged($data,$rated);

        require_once("elements/loggedPopularElement.php");
        $popular = new E\loggedPopularElement();
        $popular->renderlogged($data,$rated);
        ?>
        </body>
        </html>
        <?php
    }
}