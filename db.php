<?php
require_once "grafika-master/src/autoloader.php";

use Grafika\Grafika;

/**
 * @return PDO
 */
function connect()
{
    try {
        $dsn = "sqlite:" . __DIR__ . "/recipes.sqlite";
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    } catch (PDOException $e) {
        echo $e->errorInfo;
        exit();
    }
}


/**
 * @param $getId
 */
function deleteRecipe($getId)
{
    $id = $getId;
    $img = getOneRecipe($id)[0][0]["img"];
    $file = "uploads/$img";
    $query1 = "DELETE FROM recipes WHERE id = '$id'";
    $query2 = "DELETE FROM ingredients WHERE id = '$id'";
    $query3 = "DELETE FROM instructions WHERE id = '$id'";

    unlink($file);
    runQuery($query1);
    runQuery($query2);
    runQuery($query3);
}


/**
 * @param $query
 * @return array
 */
function fetchAll($query)
{
    $db = connect();
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

/**
 * @param $option
 * @return array
 */
function getAllRecipes($option)
{
    $ids = array();
    $result = array();
    $oneDimensionalArray = array();
    $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($get["search"])) {
        $search = $get["search"];
    }
    $query = "SELECT * FROM recipes";
    if ($option["option"] ?? null) {
        if ($option["option"] === "namn") {
            $query .= " ORDER BY name";
        } else if ($option["option"] === "nyast") {
            $query .= " ORDER BY id DESC";
        } else if ($option["option"] === "sökning") {
            $query .= " WHERE name LIKE '%$search%'";
            for ($i = 1; $i < 10; $i++) {
                $id = fetchAll("SELECT id FROM ingredients WHERE ingredient_" . $i . " LIKE '%$search%'");
                if (!empty($id)) {
                    array_push($ids, $id);
                }

            }
            if (!empty($ids)) {
                foreach ($ids as $key => $value) {
                    $name = getOneName($value[0]["id"]);
                    array_push($oneDimensionalArray, $name);
                }
            }

        }
    } else {
        $query .= " ORDER BY id DESC";
    }
    if (!empty($oneDimensionalArray)) {
        $result = call_user_func_array('array_merge', $oneDimensionalArray);
    } else {
        $result = array();
    }
    $fetch = fetchAll($query);
    if (!empty($fetch)) {
        if (!empty($result)) {
            foreach ($fetch as $value) {
                array_unshift($result, $value);
            }
        } else {
            foreach ($fetch as $value) {
                array_push($result, $value);
            }
        }
    }
    return $result;
}


/**
 * @param $id
 * @return array
 */
function getOneIngredients($id)
{
    $query = "SELECT * FROM ingredients WHERE id = $id";
    return fetchAll($query);
}


/**
 * @param $id
 * @return array
 */
function getOneInstructions($id)
{
    $query = "SELECT * FROM instructions WHERE id = $id";
    return fetchAll($query);
}


/**
 * @param $id
 * @return array
 */
function getOneName($id)
{
    $query = "SELECT * FROM recipes WHERE id = $id";
    return fetchAll($query);
}

/**
 * @param $id
 * @return array
 */
function getOneRecipe($id)
{
    return $result = array(getOneName($id), getOneIngredients($id),
        getOneInstructions($id));

}

/**
 * @param $img
 * @throws Exception
 */
function resizeImg($img)
{
    if ($img ?? null) {
        $editor = Grafika::createEditor();
        $editor->open($image, "uploads/$img");
        $editor->resizeFill($image, 300, 200);
        $editor->save($image, "uploads/$img");
    }
}

/**
 * @param $query
 */
function runQuery($query)
{
    $db = connect();
    $stmt = $db->prepare($query);
    $stmt->execute();
}

/**
 * @param $data
 * @param $img
 * @throws Exception
 */
function storeRecipe($data, $img)
{
    $names = array();
    $ingredients = array();
    $instructions = array();
    $result = fetchAll("SELECT MAX(id) FROM recipes");
    $id = $result[0]['MAX(id)'] + 1;
    $date = date("Y-m-d");
    $query1 = "INSERT INTO recipes VALUES(
    $id,
    :name,
    :img,
    '$date')";
    $query2 = "INSERT INTO ingredients VALUES(
    $id,
    :ingredient_1,
    :ingredient_2,
    :ingredient_3,
    :ingredient_4,
    :ingredient_5,
    :ingredient_6,
    :ingredient_7,
    :ingredient_8,
    :ingredient_9,
     :ingredient_10)";
    $query3 = "INSERT INTO instructions VALUES(
     $id,
    :instruction_1,
    :instruction_2,
    :instruction_3,
    :instruction_4,
    :instruction_5,
    :instruction_6,
    :instruction_7,
    :instruction_8,
    :instruction_9,
    :instruction_10)";
    foreach ($data as $key => $value) {

        $nameExist = strpos($key, "name");
        $ingredientExist = strpos($key, "ingredient");
        $instructionExist = strpos($key, "instruction");

        if ($nameExist === 0) {
            array_push($names, [$key => $value]);
        } else if ($ingredientExist === 0) {
            array_push($ingredients, [$key => $value]);
        } else if ($instructionExist === 0) {
            array_push($instructions, [$key => $value]);
        }
    }
    resizeImg($img);
    updateDatabase($query1, $query2, $query3, $names, $ingredients, $instructions, $img);
    //resizeImg($img);

}


/**
 * @param $query1
 * @param $query2
 * @param $query3
 * @param $names
 * @param $inputIngredients
 * @param $inputInstructions
 * @param $img
 * @throws Exception
 */
function updateDatabase($query1, $query2, $query3, $names, $inputIngredients, $inputInstructions, $img)
{
    $db = connect();
    $stmt1 = $db->prepare($query1);
    $stmt2 = $db->prepare($query2);
    $stmt3 = $db->prepare($query3);
    if (!empty($inputIngredients)) {
        $ingredients = call_user_func_array('array_merge', $inputIngredients);
    }
    if (!empty($inputInstructions)) {
        $instructions = call_user_func_array('array_merge', $inputInstructions);
    }
    $stmt1->bindParam(":name", $names[0]["name"]);
    $stmt1->bindParam(":img", $img);
    if (!empty($ingredients)) {
        foreach ($ingredients as $key => $value) {
            $stmt2->bindValue(":$key", $value);

        }
    }
    if (!empty($instructions)) {
        foreach ($instructions as $key => $value) {
            $stmt3->bindValue($key, $value);

        }
    }
    $stmt1->execute();
    $stmt2->execute();
    $stmt3->execute();
    resizeImg($img);
}


/**
 * @param $id
 * @param $data
 * @param $img
 * @throws Exception
 */
function updateRecipe($id, $data, $img)
{
    $names = array();
    $ingredients = array();
    $instructions = array();
    $query1 = "UPDATE recipes SET 
                   name=:name,
                   img = :img
            WHERE id = $id";
    $query2 = "UPDATE ingredients SET
                       ingredient_1 = :ingredient_1,
    ingredient_2= :ingredient_2,
    ingredient_3= :ingredient_3,
    ingredient_4= :ingredient_4,
    ingredient_5= :ingredient_5,
    ingredient_6= :ingredient_6,
    ingredient_7= :ingredient_7,
    ingredient_8= :ingredient_8,
    ingredient_9= :ingredient_9,
    ingredient_10 = :ingredient_10
                       WHERE id = $id";
    $query3 = "UPDATE instructions SET
    instruction_1 = :instruction_1,
    instruction_2= :instruction_2,
    instruction_3= :instruction_3,
    instruction_4= :instruction_4,
    instruction_5= :instruction_5,
    instruction_6= :instruction_6,
    instruction_7= :instruction_7,
    instruction_8= :instruction_8,
    instruction_9= :instruction_9,
    instruction_10 = :instruction_10
                       WHERE id = $id";
    foreach ($data as $key => $value) {

        $nameExist = strpos($key, "name");
        $ingredientExist = strpos($key, "ingredient");
        $instructionExist = strpos($key, "instruction");

        if ($nameExist === 0) {
            array_push($names, [$key => $value]);
        } else if ($ingredientExist === 0) {
            array_push($ingredients, [$key => $value]);
        } else if ($instructionExist === 0) {
            array_push($instructions, [$key => $value]);
        }
    }
    updateDatabase($query1, $query2, $query3, $names, $ingredients, $instructions, $img);

}


/**
 * @param $post
 * @param $files
 * @return array
 */
function uploadFile($post, $files)
{
    $test = "false";
    if (isset($post['submit'])) {
        if (!empty($files)) {
            $img = $files['img'];
            $imgName = $files['img']['name'];
            $imgTmpName = $files['img']['tmp_name'];
            $imgSize = $files['img']['size'];
            $imgError = $files['img']['error'];
            $imgType = $files['img']['type'];

            $imgExt = explode('.', $imgName);
            $imgActualExt = strtolower(end($imgExt));

            $allowed = array('jpg', 'jpeg', 'png');
            if ($files["img"]["name"] != "") {
                if (in_array($imgActualExt, $allowed)) {
                    if ($imgError === 0) {
                        if ($imgSize < 5000000) {
                            $test = "true";
                            $fileNameNew = uniqid('', true) . "." . $imgActualExt;
                            $fileDestination = 'uploads/' . $fileNameNew;
                            move_uploaded_file($imgTmpName, $fileDestination);
                        } else {
                            echo "Din fil är för stor!";
                            $fileNameNew = null;
                        }
                    } else {
                        echo "There was an error uploading your file!";
                        $fileNameNew = null;
                    }
                } else {
                    echo "Du kan inte ladda upp bilder i det här formatet! Kolla att din bild är en jpg, jpeg eller png";
                    $fileNameNew = null;
                }
            } else {
                $test = "true";
                $fileNameNew = null;
            }
        }
        $result = array($test, $fileNameNew);
        return $result;
    }
}