function message(){
    

        
    let form = document.getElementById('formConnexion');
    form.addEventListener('submit',function(e){
        var email = document.getElementById('email');
        var mdp = document.getElementById('password');

    if(email.value.trim() ==="" && mdp.value.trim() ===""){
        let danger = document.getElementById('danger');
        danger.innerHTML = "votre email ou mot de passe est incorrect";
        danger.style.color ='red';

        e.preventDefault();
    }});



}

function afficheSousCat(){

    let form = document.getElementById('formCategorie');
    let div = document.getElementById('div_categorie');
    
    form.addEventListener('submit',function(e){
        if(div.classList.contains("d-none")){
        div.classList.remove("d-none");
        e.preventDefault();
        }
    

    });
}

function afficheSousCat1(){

    let form = document.getElementById('formCategorie');
    let div = document.getElementById('div_categorie1');
    
    form.addEventListener('submit',function(e){
        if(div.classList.contains("d-none")){
            div.classList.remove("d-none");
            e.preventDefault();
        }

    });
}