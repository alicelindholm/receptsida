<?php
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

function runQuery($query)
{
    $db = connect();
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getOneRecipe($id)
{
    return $result = array(getOneName($id), getOneIngredients($id),
        getOneInstructions($id));

}

function getAll()
{
    return $result = array(getAllNames(), getAllIngredients(),
        getAllInstructions());
}

function getAllNames()
{
    $query = "SELECT * FROM recipes WHERE 1";
    return runQuery($query);
}

function getAllIngredients()
{
    $query = "SELECT * FROM ingredients WHERE 1";
    return runQuery($query);
}

function getAllInstructions()
{
    $query = "SELECT * FROM instructions WHERE 1";
    return runQuery($query);
}

function getOneName($id)
{
    $query = "SELECT * FROM recipes WHERE id = $id";
    return runQuery($query);
}

function getOneIngredients($id)
{
    $query = "SELECT * FROM ingredients WHERE id = $id";
    return runQuery($query);
}

function getOneInstructions($id)
{
    $query = "SELECT * FROM instructions WHERE id = $id";
    return runQuery($query);
}

function storeRecipe($data)
{
    $result = runQuery("SELECT MAX(id) FROM recipes");
    $id = $result[0]['MAX(id)'] + 1;
    $name = $data['name'];
    $ingredient_1 = $data['ingredient_1'] ?? null;
    $ingredient_2 = $data['ingredient_2'] ?? null;
    $ingredient_3 = $data['ingredient_3'] ?? null;
    $ingredient_4 = $data['ingredient_4'] ?? null;
    $ingredient_5 = $data['ingredient_5'] ?? null;
    $ingredient_6 = $data['ingredient_5'] ?? null;
    $ingredient_7 = $data['ingredient_5'] ?? null;
    $ingredient_8 = $data['ingredient_5'] ?? null;
    $ingredient_9 = $data['ingredient_5'] ?? null;
    $ingredient_10 = $data['ingredient_5'] ?? null;
    $instruction_1 = $data['instruction_1'] ?? null;
    $instruction_2 = $data['instruction_2'] ?? null;
    $instruction_3 = $data['instruction_3'] ?? null;
    $instruction_4 = $data['instruction_4'] ?? null;
    $instruction_5 = $data['instruction_5'] ?? null;
    $instruction_6 = $data['instruction_5'] ?? null;
    $instruction_7 = $data['instruction_5'] ?? null;
    $instruction_8 = $data['instruction_5'] ?? null;
    $instruction_9 = $data['instruction_5'] ?? null;
    $instruction_10 = $data['instruction_5'] ?? null;
    echo "här:";
    $query1 = "INSERT INTO recipes VALUES(
     $id,
     '$name')";
    $query2 = "INSERT INTO ingredients VALUES(
    $id,
    '$ingredient_1',
    '$ingredient_2',
    '$ingredient_3',
    '$ingredient_4',
    '$ingredient_5',
    '$ingredient_6',
    '$ingredient_7',
    '$ingredient_8',
    '$ingredient_9',
     '$ingredient_10')";
    $query3 = "INSERT INTO instructions VALUES(
     $id,
    '$instruction_1',
    '$instruction_2',
    '$instruction_3',
    '$instruction_4',
    '$instruction_5',
    '$instruction_6',
    '$instruction_7',
    '$instruction_8',
    '$instruction_9',
    '$instruction_10')";

    runQuery($query1);
    runQuery($query2);
    runQuery($query3);

}
