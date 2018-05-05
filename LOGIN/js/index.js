
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var placeholders = document.getElementsByTagName("input").getAttribute("placeholder");

function hidePlaceHolder(event){
    event.currentTarget.setAttribute("placeholder","");
}

function restorePlaceHolder(event){
    event.currentTraget.
}


var inputs = document.getElementsByTagName("input");
for(var i = 0; i < inputs.length ; i++ ){
    inputs[i].addEventListener("focus", hidePlaceHolder, false);
}