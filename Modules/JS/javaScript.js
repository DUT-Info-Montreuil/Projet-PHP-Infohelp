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