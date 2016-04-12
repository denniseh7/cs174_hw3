<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 10:30 PM
 */

namespace dennis\hw3\views;

require_once("View.php");

class SignUpView extends View
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
            <h1 class="ImageSignUp">ImageRating SignUp</h1>
            <form name="Signupform" id="Signupform" action="../controllers/SignUpController.php" method="post">
                <label for="username">UserName: </label>
                <input type="text" name="uname"/>
                <label for="pwd">Password: </label>
                <input type="text" name="pwd"/>
                <label for="pwd2">Confirm Password: </label>
                <input type="text" name="pwd2"/>
                <input type="submit" value="Register"/>
            </form>
            <a href="../../index.php">Home Page</a>
            <a href="SignInView.php">Sign In Page</a>
        </div>
        <?php
            if (isset($_SESSION['signup'])){
                ?><div>username taken or passwords must match</div><?php
            }
    }
}

$signup = new SignUpView();

$signup->render(null);