<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 4:37 PM
 */

namespace dennis\hw3\views;

require_once("View.php");

class uploadView extends View
{
    public function render($data)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Upload Image</title>
        <body>
            <h1>Upload Image</h1>
            <form action="../controllers/uploadController.php" method="post" enctype="multipart/form-data">

                <div></div>
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <div>
                    <label>Caption:</label>
                    <input type="text" name="caption" id="caption" size="50">
                </div>
                <input type="submit" value="Upload Image" name="submit">

            </form>
            <a href="../../index.php">Home Page</a>

        </body>
        </html>
        <?php
    }
}

$uView = new uploadView();
$uView->render(null);