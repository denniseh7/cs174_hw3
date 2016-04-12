<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 2:58 PM
 */

namespace dennis\hw3\views;

require_once("View.php");

class SignInView extends View
{
    public function render($data)
    {
        session_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <body>
        <div class="SignInForm">
        <h1 class="ImageSignIn">ImageRating SignIn</h1>
        <form name="Signinform" id="Signinform" action="../controllers/SignInController.php" method="post">
                <label for="username">UserName: </label>
                <input type="text" name="uname"/>
                <label for="pwd">Password: </label>
                <input type="text" name="pwd"/>
            <input type="submit" value="Go"/>
        </form>
            <a href="../../index.php">Home Page</a>
        </div>
    <?php

        if(isset($_SESSION['signin'])){
            ?><div>Please Enter Correct UserName or Password</div><?php
        }
    }
}

$signin = new SignInView();

$signin->render(null);

