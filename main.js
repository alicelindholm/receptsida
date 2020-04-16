let amountIngredient = 5;
let amountInstruction = 2;

function addIngredient() {
    amountIngredient += 1;
    if (amountIngredient < 21) {
        document.getElementById("ingredientBox" + amountIngredient).innerHTML += "<label>Ingrediens " + amountIngredient + ": <input type='text' class='form-control' name='ingredient_" + amountIngredient + "' id='ingredient_" + amountIngredient + "' ></label> <br>";
    } else {
        alert("Du kan inte ha mer än 20 ingredienser!")
    }
}

function addInstruction() {
    amountInstruction += 1;
    if (amountInstruction < 21) {
        document.getElementById("instructionBox" + amountInstruction).innerHTML += "<label>Steg " + amountInstruction + ":<br> <textarea type='text' class='form-control' name='instruction_" + amountInstruction + "' id='instruction_" + amountInstruction + "'  rows='5' cols='50'></textarea></label> <br>";
    } else {
        alert("Du kan inte ha mer än 20 instruktioner!")
    }
}
