function hideexemple(id){

    const collection = document.getElementsByClassName("exemple");
    for (let i = 0; i < collection.length; i++) {
        collection[i].style.display = "none";
    }
    collection[id].style.display = "block";

}
function reussite(){
    alert("vous avez reussi enfin vous juste fait un if avec tout les exemple mais bravo quand meme");
}
function redirect(id){

    window.location = "../../../index.php/?action=problem&id="+id.toString();
}