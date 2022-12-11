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


