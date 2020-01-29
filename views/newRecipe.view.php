<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Nytt recept</title>
    <link rel="icon" href="icon.jpg">
</head>
<body>
<div class="container">
    <h1 class="display-3"><a class="text-dark" href="../">Receptsida</a></h1>
    <h1> Nytt recept </h1>

    <form action="./sparaRecept" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Namn:
                <input type="text" class="form-control" name="name" id="name"> <br>
            </label>
            <input type="file" name="img" id="img">
            <h2>Ingredienser</h2>
            <p> Glöm inte att fylla i mängd!</p>

            <?php
            $i = 0;
            for ($i; $i < 5; $i++) { ?>
                <div class="ingredientbox<?= $i + 1 ?>">
                    <div id="ingredientBox<?= $i + 1 ?>">
                        <label> Ingrediens <?= $i + 1 ?>:
                            <input type="text" class="form-control" name="ingredient_<?= $i + 1 ?>" id="<?= $i + 1 ?>">
                        </label>
                    </div>
                </div>
                <br>
            <?php }
            ?>
            <!-- Extra ingredienser -->
            <div id="ingredientBox6"></div>
            <div id="ingredientBox7"></div>
            <div id="ingredientBox8"></div>
            <div id="ingredientBox9"></div>
            <div id="ingredientBox10"></div>
            <input type="button" class="btn btn-secondary" onclick="removeIngredient(amountIngredient)" value="-">
            <input type="button" class="btn btn-secondary" onclick="addIngredient()" value="+"> <label for=""> Lägg till
                ingrediens</label>
            <h2>Instruktioner</h2>
            <?php
            for ($i = 0; $i < 2; $i++) { ?>
                <label> Steg <?= $i + 1 ?>: <br>
                    <textarea class="form-control" name="instruction_<?= $i + 1 ?>" id="instruction_<?= $i + 1 ?>"
                              rows="5" cols="50"></textarea>
                </label>
                <br>
            <?php }
            ?>
            <!-- Extra instruktioner -->
            <div id="instructionBox3"></div>
            <div id="instructionBox4"></div>
            <div id="instructionBox5"></div>
            <div id="instructionBox6"></div>
            <div id="instructionBox7"></div>
            <div id="instructionBox8"></div>
            <div id="instructionBox9"></div>
            <div id="instructionBox10"></div>
            <input type="button" class="btn btn-secondary" onclick="addInstruction()" value="+"> <label for="">Lägg till
                instruktion</label>
            <br>

            <button type="submit" class="btn btn-success" name="submit">Lägg till recept</button>
        </div>
    </form>
</div>

</body>
</html>
