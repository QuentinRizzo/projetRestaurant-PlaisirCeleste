// Afficher Cacher le mot de passe \\

let masquer = document.getElementById('co');
let inscription = document.getElementById('coInscription');
let inscriptionConfirm = document.getElementById('coInscriptionConfirm');

let mdpCacher = [masquer, inscription, inscriptionConfirm];

// Récupération des départements 
let select = document.getElementById('departement');


// console.log(mdpCacher.length);

if (masquer !== null && inscription !== null && inscriptionConfirm !== null) {
    for (let i = 0; i < mdpCacher.length; i++) {

        // console.log('in');

        mdpCacher[i].addEventListener('click', function () {

            let id = mdpCacher[i].id + "Password";
            // console.log(id);

            let elt = document.getElementById(id);

            if (elt.type.toLowerCase() == "password") {
                elt.type = "text";
            }
            else {
                elt.type = "password";
            }
        });
    }
}


// ================================================================= \\

// Slider\\

//fonction avec bouton \\
const images = document.querySelectorAll('.slide');
const nbImg = images.length;
const suivant = document.querySelector('.suivant');
const precedent = document.querySelector('.precedent');
const indicateurs = document.querySelectorAll('.dote-slider');
let start = 0;

if (images !== null && nbImg !== null && suivant !== null && precedent !== null && indicateurs !== null && start !== null){
    function updateIndicateurs() {
        indicateurs.forEach((indicator, i) => {
            const isStart = i === start;
            indicator.classList.toggle('active', isStart);
            indicator.setAttribute('aria-current', isStart);
        });
    }

    function changeSlide(direction) {
        images[start].classList.remove('active');
        start = (start + (direction === 'next' ? 1 : -1) + nbImg) % nbImg;
        images[start].classList.add('active');
        updateIndicateurs();
    }

    suivant.addEventListener('click', () => changeSlide('next'));
    precedent.addEventListener('click', () => changeSlide('prev'));

    function startAutoSlide() {
        setInterval(() => changeSlide('next'), 8000);
    }
    startAutoSlide();

    updateIndicateurs();

    // Fin Slider\\
}



// Villes & Département dynamique \\


if (select !== null){
    select.addEventListener('change', selectDept);
}
function selectDept() {
    let idDept = $('#departement').val(); //on récupère l'id des departement $ veux dire jquery val = valeur des département donc le nom
    $.ajax({
        url: '../controler/ajax.php',
        method: 'POST',
        dataType: 'json',
        data: { idDepartement: idDept, action: 'selectvilledept' },
        success: function (reponse) {
            // console.log(reponse);

            let selectVilles = document.getElementById('ville');
            console.log(selectVilles);
            for (let i = 0; i < reponse.length; i++) {
                cp = reponse[i].code_postal;
                tabCps = cp.split('-');
                for (let j = 0; j < tabCps.length; j++) {
                    let option = document.createElement('option');
                    option.value = reponse[i].id_ville + '-' + tabCps[j];
                    option.text = reponse[i].nom_ville + ' (' + tabCps[j] + ')';
                    selectVilles.appendChild(option);
                }
            }
        }
    })
}


// Envoi du mail par Mailto après le traitement\\

function buildMailtoLink() {
    // Get form data
    var nom = document.getElementsByName("nomEnvoiMessage")[0].value;
    var prenom = document.getElementsByName("prenomEnvoiMessage")[0].value;
    var email = document.getElementsByName("mailEnvoiMessage")[0].value;
    var objet = document.getElementsByName("objetEnvoiMessage")[0].value;
    var message = document.getElementsByName("msgEnvoiMessage")[0].value;


    var mailtoLink = "mailto:" + email + "?subject=" + encodeURIComponent(objet) + "&body=" + encodeURIComponent("Nom: " + nom + "\nPrénom: " + prenom + "\nMessage: " + message);


    window.open(mailtoLink, "_blank");

    return false;
}


// Afficher le formulaire  Modifier  mot de passe \\

// $ = appel de jQuery
$(document).ready(function () {
    // Cacher le formulaire de modification de mot de passe initialement
    $("#form-mdp").hide();

    // Lorsque l'utilisateur clique sur le lien "Modifier mon mot de passe"
    $("#modifierMdp").click(function (e) {
        e.preventDefault(); // Empêche le lien de suivre le lien href

        // On Vérifi si le formulaire est visible ou non 
        if ($("#form-mdp").is(":visible")) {  //is(":visible") est un sélécteur jQuery pour vérifier si le form est visible ou non
            // Si visible on le cache
            $("#form-mdp").hide();
        } else {
            // Sinon on l'affiche
            $("#form-mdp").show();
        }
    });
});









