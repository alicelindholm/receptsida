<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nytt recept</title>
</head>
<body>
<h1> Nytt recept </h1>

<!-- Formuläret-->
<form action="storeRecipe.php" method="post" enctype="multipart/form-data">
    <label for="name">Namn: </label>
    <input type="text" name="name" id="name"> <br>

    <input type="file" name="img" id="img">
    <h3>Ingredienser</h3>
    <p> Glöm inte att fylla i mängd!</p>
    <div id="ingredientBox">
        <?php
        for ($i = 0; $i < 5; $i++) { ?>
            <label> Ingrediens <?= $i + 1 ?>:
                <input type="text" name="ingredient_<?= $i + 1 ?>" id="<?= $i + 1 ?>">
            </label>
            <br>
        <?php }
        ?>
    </div>
    <input type="button" onclick="addIngredient()" value="+"> <label for=""> Lägg till ingrediens</label>
    <h3>Instruktioner</h3>
    <div id="instructionBox">
        <?php
        for ($i = 0; $i < 2; $i++) { ?>
            <label> Steg <?= $i + 1 ?>: </label> <br>
            <textarea name="instruction_<?= $i + 1 ?>" id="instruction_<?= $i + 1 ?>" rows="10" cols="70"></textarea>

            <br>
        <?php }
        ?>
    </div>
    <input type="button" onclick="addInstruction()" value="+"> <label for="">Lägg till instruktion</label>
    <br>
    <button type="submit" name="submit">Lägg till recept</button>

</form>
<script>
    let amountIngredient = 5;
    let amountInstruction = 2;

    function addIngredient() {
        amountIngredient += 1;
        if (amountIngredient < 11) {
            document.getElementById("ingredientBox").innerHTML += "<label>Ingrediens " + amountIngredient + ": <input type='text' name='ingredient_" + amountIngredient + "' id='ingredient_" + amountIngredient + "' ></label> <br>";
        } else {
            alert("Du kan inte ha mer än 10 ingredienser!")
        }
    }

    function addInstruction() {
        amountInstruction += 1;
        if (amountInstruction < 11) {
            document.getElementById("instructionBox").innerHTML += "<label>Steg " + amountInstruction + ":</label><br> <textarea type='text' name='instruction_" + amountInstruction + "' id='instruction_" + amountInstruction + "'  rows=\"10\" cols=\"70\"></textarea> <br>";
        } else {
            alert("Du kan inte ha mer än 10 instruktioner!")
        }
    }
</script>
</body>
</html>
