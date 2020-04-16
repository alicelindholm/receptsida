<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Redigera <?= $recipe[0][0]["name"] ?> - Receptsida</title>
    <link rel="icon" href="../icon.jpg">
</head>
<body>
<div class="container">
    <h1 class="display-3"><a class="text-dark" href="../">Receptsida</a></h1>
    <div class="row">

        <div class="col align-self-center">
            <h2>Redigera <?= $recipe[0][0]["name"] ?></h2>
            <?php
            ?>
            <form action="../uppdateraRecept/<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="name" id="name" value="<?= $recipe[0][0]['name'] ?>"> <br>
                    <?php if ($recipe[0][0]["img"] != null) { ?>
                        <div class="my-3"><img src="../uploads/<?= $recipe[0][0]['img'] ?>" alt="Card image cap"></div>
                    <?php }
                    ?>
                    <br> <label for="portions"><b>Portioner: </b><input type="number" name="portions" id="portions" value="<?=$recipe[0][0]['portions']?>"></label>
                    <br><label for="category"> Kategori:
                        <select name="category" id="category">
                            <option value="<?=$recipe[0][0]['category']?>" selected> <?=$recipe[0][0]['category']?></option>
                    <?php
                    foreach($allowedCategories as $value){ ?>
                        <option value="<?=$value?>"><?=$value?></option>

                   <?php  }
                    ?>
                        </select>

                    </label>

                    <br> <input type="file" name="img" id="img" value="<?= $recipe[0][0]['img'] ?>"> <br>
                    <?php
                    for ($i = 1; $i < $countIngredients + 1; $i++) {
                        ?>
                        <label> Ingrediens <?=$i?>:
                        <input type="text" class="form-control" name="ingredient_<?= $i ?>" id="<?= $i ?>"
                               value="<?= $recipe[1][0]['ingredient_' . $i] ?>">
                        </label>
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
                    <div id="ingredientBox11"></div>
                    <div id="ingredientBox12"></div>
                    <div id="ingredientBox13"></div>
                    <div id="ingredientBox14"></div>
                    <div id="ingredientBox15"></div>
                    <div id="ingredientBox16"></div>
                    <div id="ingredientBox17"></div>
                    <div id="ingredientBox18"></div>
                    <div id="ingredientBox19"></div>
                    <div id="ingredientBox20"></div>

                    <input type="button" class="btn btn-secondary" onclick="addIngredient()" value="+"> <label for="">
                        Lägg till ingrediens</label> <br>
                    <?php

                    for ($i = 1; $i < $countInstructions + 1; $i++) {
                        ?>
                        <label for=""> Steg <?= $i ?>:
                        <textarea name="instruction_<?= $i ?>" id="<?= $i ?>" class='form-control' rows="5"
                                  cols="50"><?= $recipe[2][0]["instruction_" . $i] ?></textarea>
                            </label><br>
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
                    <div id="instructionBox11"></div>
                    <div id="instructionBox12"></div>
                    <div id="instructionBox13"></div>
                    <div id="instructionBox14"></div>
                    <div id="instructionBox15"></div>
                    <div id="instructionBox16"></div>
                    <div id="instructionBox17"></div>
                    <div id="instructionBox18"></div>
                    <div id="instructionBox19"></div>
                    <div id="instructionBox20"></div>
                    <input type="button" class="btn btn-secondary" onclick="addInstruction()" value="+"> <label for="">Lägg
                        till
                        instruktion</label>

                    <br>
                    <button type="submit" class="btn btn-success" name="submit">Spara ändringar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

