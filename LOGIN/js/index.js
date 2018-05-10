
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
<<<<<<< HEAD

function hidePlaceHolder(event){
    const eValue = event.currentTarget.getAttribute("placeholder");
    event.currentTarget.setAttribute("placeholder","");
}

=======
var placeholders = document.getElementsByTagName("input").getAttribute("placeholder");

function hidePlaceHolder(event){
    event.currentTarget.setAttribute("placeholder","");
}

function restorePlaceHolder(event){
    event.currentTraget.
}

>>>>>>> 1facd3944320915824ef02887a6065e88fb46084

var inputs = document.getElementsByTagName("input");
for(var i = 0; i < inputs.length ; i++ ){
    inputs[i].addEventListener("focus", hidePlaceHolder, false);
}