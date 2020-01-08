<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Redigera <?php echo "hej" ?></title>
</head>
<body>
<div class="container">
    <h1 class="display-3"><a class="text-dark" href="../">Receptsida</a></h1>
    <div class="row">

        <div class="col align-self-center">
            <h2>Redigera <?= $recipe[0][0]["name"] ?></h2>
            <?php
            ?>
            <form action="../updateRecipe.php/?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <input type="text" name="name" id="name" value="<?= $recipe[0][0]['name'] ?>"> <br>
                <?php if ($recipe[0][0]["img"] != null) { ?>
                    <img src="../uploads/<?= $recipe[0][0]['img'] ?>" alt="Card image cap">
                <?php } ?>
                <br> <input type="file" name="img" id="img" value="<?= $recipe[0][0]['img'] ?>"> <br>
                <?php
                for ($i = 1; $i < $countIngredients + 1; $i++) {
                    ?>
                    <input type="text" class="form-control" name="ingredient_<?= $i ?>" id="<?= $i ?>"
                           value="<?= $recipe[1][0]['ingredient_' . $i] ?>">
                    <br>
                    <?php
                } ?>

                <!-- Lägg till( och ta bort) ingredienser-->
                <div id="ingredientBox1"></div>
                <div id="ingredientBox2"></div>
                <div id="ingredientBox3"></div>
                <div id="ingredientBox4"></div>
                <div id="ingredientBox5"></div>
                <div id="ingredientBox6"></div>
                <div id="ingredientBox7"></div>
                <div id="ingredientBox8"></div>
                <div id="ingredientBox9"></div>
                <div id="ingredientBox10"></div>

                <input type="button" class="btn btn-secondary" onclick="addIngredient()" value="+"> <label for=""> Lägg
                    till
                    ingrediens</label>
                <?php

                for ($i = 1; $i < $countInstructions + 1; $i++) {
                    ?>
                    <textarea name="instruction_<?= $i ?>" id="<?= $i ?>" rows="10"
                              cols="70"><?= $recipe[2][0]["instruction_" . $i] ?></textarea>
                    <br>
                    <?php
                }
                ?>

                <!-- Lägg till( och ta bort) instruktioner-->
                <div id="instructionBox1"></div>
                <div id="instructionBox2"></div>
                <div id="instructionBox3"></div>
                <div id="instructionBox4"></div>
                <div id="instructionBox5"></div>
                <div id="instructionBox6"></div>
                <div id="instructionBox7"></div>
                <div id="instructionBox8"></div>
                <div id="instructionBox9"></div>
                <div id="instructionBox10"></div>
                <input type="button" class="btn btn-secondary" onclick="addInstruction()" value="+"> <label for="">Lägg
                    till
                    instruktion</label>

                <br>
                <button type="submit" name="submit">Spara ändringar</button>

            </form>
        </div>
    </div>
</div>
<script>
let amountIngredient = <?=$countIngredients?>;
let amountInstruction = <?=$countInstructions?>;
    function addIngredient() {
        amountIngredient += 1;
        if (amountIngredient < 11) {
            document.getElementById("ingredientBox" + amountIngredient).innerHTML += "<label>Ingrediens " + amountIngredient + ": <input type='text' class='form-control' name='ingredient_" + amountIngredient + "' id='ingredient_" + amountIngredient + "' ></label> <br>";
        } else {
            alert("Du kan inte ha mer än 10 ingredienser!")
        }
    }

    function addInstruction() {
        amountInstruction += 1;
        if (amountInstruction < 11) {
            document.getElementById("instructionBox" + amountInstruction).innerHTML += "<label>Steg " + amountInstruction + ":</label><br> <textarea type='text' class='form-control' name='instruction_" + amountInstruction + "' id='instruction_" + amountInstruction + "'  rows='5'></textarea> <br>";
        } else {
            alert("Du kan inte ha mer än 10 instruktioner!")
        }
    }
</script>
</body>
</html>

