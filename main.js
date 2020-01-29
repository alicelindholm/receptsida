let amountIngredient = 5;
let amountInstruction = 2;
console.log(amountIngredient);
function addIngredient() {
    amountIngredient += 1;
    if (amountIngredient < 11) {
        document.getElementById("ingredientBox" + amountIngredient).innerHTML += "<label>Ingrediens " + amountIngredient + ": <input type='text' class='form-control' name='ingredient_" + amountIngredient + "' id='ingredient_" + amountIngredient + "' ></label> <br>";
   console.log("slut: "+ amountIngredient);
    } else {
        alert("Du kan inte ha mer än 10 ingredienser!")
    }
}

function addInstruction() {
    amountInstruction += 1;
    if (amountInstruction < 11) {
        document.getElementById("instructionBox" + amountInstruction).innerHTML += "<label>Steg " + amountInstruction + ":<br> <textarea type='text' class='form-control' name='instruction_" + amountInstruction + "' id='instruction_" + amountInstruction + "'  rows='5' cols='50'></textarea></label> <br>";
    } else {
        alert("Du kan inte ha mer än 10 instruktioner!")
    }
}
function removeIngredient() {

    console.log("amount"+amountIngredient);
    let element = document.getElementById("ingredientBox" + amountIngredient);
    element.parentNode.removeChild(element);
    console.log(element);
    amountIngredient = amountIngredient-1;
    console.log("slut"+amountIngredient);


}
