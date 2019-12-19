<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redigera <?php echo "hej" ?></title>
</head>
<body>
<a href="../">Kom hem igen!</a>
<h1>Receptsida</h1>
<h2>Redigera <?=$recipe[0][0]["name"]?></h2>
<?php
?>
<form action="../updateRecipe.php/?id=<?=$id?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name" id="name" value="<?= $recipe[0][0]['name'] ?>"> <br>
    <?php if($recipe[0][0]["img"] != null){?>
        <img class="card-img-top" src="../uploads/<?=$recipe[0][0]['img']?>" alt="Card image cap">
    <?php } ?>
     <br> <input type="file" name="img" id="img" value="<?=$recipe[0][0]['img']?>"> <br>
    <?php
    for ($i = 1; $i < 11; $i++) {
        if ($recipe[1][0]['ingredient_' . $i] != "") {
            ?>
            <input type="text" name="ingredient_<?= $i ?>" id="<?= $i ?>"
                   value="<?= $recipe[1][0]['ingredient_' . $i] ?>">
            <br>
        <?php }
    }
    for ($i = 1; $i < 11; $i++) {
        if ($recipe[2][0]['instruction_' . $i] != "") {
            ?>
            <textarea name="instruction_<?= $i ?>" id="<?= $i ?>" rows="10" cols="70"><?=$recipe[2][0]["instruction_".$i]?></textarea>
            <br>
        <?php }
    }
    ?>
    <button type="submit" name="submit">Spara ändringar</button>

</form>
</body>
</html>

