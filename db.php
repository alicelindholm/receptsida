<?php
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

    $id = $getId["id"];
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
 * @return array
 */
function getAll()
{
    return $result = array(getAllNames(), getAllIngredients(),
        getAllInstructions());
}


/**
 * @return array
 */
function getAllIngredients()
{
    $query = "SELECT * FROM ingredients WHERE 1";
    return fetchAll($query);
}

/**
 * @return array
 */
function getAllInstructions()
{
    $query = "SELECT * FROM instructions WHERE 1";
    return fetchAll($query);
}


/**
 * @return array
 */
function getAllNames($option)
{
    $allowed = [
        "option" => ['name', 'id']
    ];

    $query = "SELECT * FROM recipes WHERE 1";
    if ($option["option"] ?? null) {
        if ($option["option"] === "namn") {
            $query .= " ORDER BY name";
        } else if ($option["option"] === "nyast") {
            $query .= " ORDER BY id DESC";
        }
    }
    return fetchAll($query);
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
 */
function storeRecipe($data, $img)
{
    $result = fetchAll("SELECT MAX(id) FROM recipes");
    $id = $result[0]['MAX(id)'] + 1;
    $date = date('Y-m-d');
    $query1 = "INSERT INTO recipes VALUES(
    $id,
    :name,
    :img,
    $date)";
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

    updateDatabase($query1, $query2, $query3, $data, $img);


}


/**
 * @param $query1
 * @param $query2
 * @param $query3
 * @param $data
 * @param $img
 */
function updateDatabase($query1, $query2, $query3, $data, $img)
{
    $db = connect();
    $stmt1 = $db->prepare($query1);
    $stmt2 = $db->prepare($query2);
    $stmt3 = $db->prepare($query3);
    $stmt1->bindParam(":name", $data["name"]);
    $stmt1->bindParam(":img", $img);
    $stmt2->bindParam(":ingredient_1", $data["ingredient_1"]);
    $stmt2->bindParam(":ingredient_2", $data["ingredient_2"]);
    $stmt2->bindParam(":ingredient_3", $data["ingredient_3"]);
    $stmt2->bindParam(":ingredient_4", $data["ingredient_4"]);
    $stmt2->bindParam(":ingredient_5", $data["ingredient_5"]);
    $stmt2->bindParam(":ingredient_6", $data["ingredient_6"]);
    $stmt2->bindParam(":ingredient_7", $data["ingredient_7"]);
    $stmt2->bindParam(":ingredient_8", $data["ingredient_8"]);
    $stmt2->bindParam(":ingredient_9", $data["ingredient_9"]);
    $stmt2->bindParam(":ingredient_10", $data["ingredient_10"]);
    $stmt3->bindParam(":instruction_1", $data["instruction_1"]);
    $stmt3->bindParam(":instruction_2", $data["instruction_2"]);
    $stmt3->bindParam(":instruction_3", $data["instruction_3"]);
    $stmt3->bindParam(":instruction_4", $data["instruction_4"]);
    $stmt3->bindParam(":instruction_5", $data["instruction_5"]);
    $stmt3->bindParam(":instruction_6", $data["instruction_6"]);
    $stmt3->bindParam(":instruction_7", $data["instruction_7"]);
    $stmt3->bindParam(":instruction_8", $data["instruction_8"]);
    $stmt3->bindParam(":instruction_9", $data["instruction_9"]);
    $stmt3->bindParam(":instruction_10", $data["instruction_10"]);
    $stmt1->execute();
    $stmt2->execute();
    $stmt3->execute();
}


/**
 * @param $id
 * @param $data
 * @param $img
 */
function updateRecipe($id, $data, $img)
{

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
    updateDatabase($query1, $query2, $query3, $data, $img);

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