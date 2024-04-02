/*
 * Bienvenue dans le fichier JavaScript principal de votre application !
 *
 * Nous recommandons d'inclure la version construite de ce fichier JavaScript
 * (ainsi que son fichier CSS) dans votre mise en page de base (base.html.twig).
 */

// Tout CSS que vous importez sera regroupé dans un seul fichier css (app.css dans ce cas)
import './styles/app.css';

const search = document.querySelector("#search")
const done = document.querySelectorAll(".isDone");
const checkbox = document.querySelector(".checkbox")
search.addEventListener("change", function(){
    fetch(`https://127.0.0.1:8000/todo/search`, {
        method: 'post',
        body: JSON.stringify({ 
        })
    })
    .then(response => response.json())
    .then(response => {
    });
})

checkbox.addEventListener("input", function(){
    done.forEach(todo =>{
    })
})

done.forEach(todo => {
   todo.addEventListener("click", ChangeDone);
    function ChangeDone() {
        const id = todo.id;
        console.log(todo.id);
        fetch(`https://127.0.0.1:8000/todo/${id}/change-update`, {
            method: 'post',
            body: JSON.stringify({
                id: todo.id
            })})
        .then(response => response.json())
        .then(response => {
            console.log(response);
            if (todo.innerHTML == "yes") {
                todo.innerHTML = "no";
            } else {
                todo.innerHTML = "yes";
            }});}});
