let quantity = document.getElementsByClassName('quantity');
let doc = document.documentElement;
// let doc = document.getElementsByClassName('container')[0];

// console.log(form);

let cnt = 0; //создание input
var ingredientId;
var recipeId;

doc.addEventListener("click", function(){
    let inps = document.getElementsByTagName('input');
    for(let el of inps){

        if(el.name != "_token") {
            if(event.target.tagName != 'INPUT' && event.target.tagName != 'SPAN'){
                console.log(el);

                let form = document.forms['ingredients'];
                let span = document.createElement('span');

                let arr = new Array(recipeId, ingredientId, el.value);
                let inputHiddenR = document.createElement('input');
                inputHiddenR.setAttribute('type', 'hidden');
                inputHiddenR.setAttribute('name', 'recipe_ingredient');
                inputHiddenR.setAttribute('value', arr);
                // let inputHiddenI = document.createElement('input');
                // inputHiddenI.setAttribute('type', 'text');
                // inputHiddenI.setAttribute('name', 'ingredient_id');
                // inputHiddenI.setAttribute('value', ingredientId);

                form.insertAdjacentElement('beforeend', inputHiddenR);

                console.log(form);

                span.setAttribute('onclick', 'cquantity()');
                span.append(el.value);
                el.insertAdjacentElement("afterend", span);
                el.remove();
                form.submit();
            }
        }
    }
    // console.log(event.target);
});

function cquantity(){
    let inp = document.createElement('input');
    inp.setAttribute('type', 'text');
    inp.setAttribute('value', event.target.innerHTML);

    ingredientId = event.target.dataset.ingredientid; //dataset id Recipe and Ingredient
    recipeId = event.target.dataset.recipeid;

    event.target.insertAdjacentElement("afterend", inp);
    event.target.remove();

}








