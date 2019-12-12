<?php
require "db.php";
if (isset($_POST['submit'])) {
    $img = $_FILES['img'];
    $imgName = $_FILES['img']['name'];
    $imgTmpName = $_FILES['img']['tmp_name'];
    $imgSize = $_FILES['img']['size'];
    $imgError = $_FILES['img']['error'];
    $imgType = $_FILES['img']['type'];

    $imgExt = explode('.', $imgName);
    $imgActualExt = strtolower(end($imgExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if ($_FILES["img"]["name"] != "") {
        if (in_array($imgActualExt, $allowed)) {
            if ($imgError === 0) {
                if ($imgSize < 500000) {
                    $fileNameNew = uniqid('', true) . "." . $imgActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($imgTmpName, $fileDestination);
                } else {
                    echo "Din fil är för stor!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    } else {
       $img = getOneRecipe($_GET["id"])[0][0]["img"];
       var_dump($img);
        $fileNameNew = $img;
    }
}
$recipe = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

updateRecipe($_GET["id"],$recipe, $fileNameNew);
header("location: ../");