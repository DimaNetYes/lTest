document.onreadystatechange = function(){
    if (document.readyState === 'complete') {
        // ещё загружается, ждём события
        document.addEventListener('DOMContentLoaded', work);

    } else {
        // DOM готов!
        work();
    }
}

function work() {
// window.onload = function() {
//     let addSelectIngredient = document.getElementById('addSelectIngredient');
//     addSelectIngredient.addEventListener('click', addIngredient);

}
// }