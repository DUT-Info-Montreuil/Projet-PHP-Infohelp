function message(){
    

        
    let form = document.getElementById('formConnexion');
    form.addEventListener('submit',function(e){
        var email = document.getElementById('email');
        var mdp = document.getElementById('password');

    if(email.value.trim() ==="" || mdp.value.trim() ===""){
        let erreur = document.getElementById('messageErreur');
        
        erreur.classList.remove("d-none");
        erreur.classList.add("d-block");

        e.preventDefault();
    }});



}


function cliquePhoto(){
    document.querySelector('#profileImage').click();
}

function affichageImage(e){
    if(e.files[0]){
        var reader = new FileReader();
    }
}


    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function(e) {
        e.preventDefault();

    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

    }