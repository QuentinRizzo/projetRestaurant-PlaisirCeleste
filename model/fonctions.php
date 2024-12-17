<?php 
// ====================================================================================\\
// = Début  Fonction lié a l'inscription et la connexion et au proifl de L'utilisateur =\\
// ======================================================================================\\

// Récupère les informations de tout les utilisateur enregistrer en bdd \\
function recupInfoAllUser($pdo, $id_user){
    $reqRecupInfoAllUser = $pdo->prepare('SELECT * FROM utilisateur JOIN adresses ON adresses.id_user = utilisateur.id_user JOIN ville ON ville.id_ville = adresses.id_ville WHERE utilisateur.id_user = ?');
    $reqRecupInfoAllUser->execute([$id_user]);
    $recupInfoAllUser = $reqRecupInfoAllUser->fetch();

    return $recupInfoAllUser;
}

// Vérification si l'utilisateur existe dans la bdd \\
function verifUserExiste($pdo, $mail){
    $reqUserExiste = $pdo->prepare('SELECT * FROM utilisateur WHERE mail = ?');
    $reqUserExiste->execute([$mail]);
    $userExiste = $reqUserExiste->fetch();

    return $userExiste;
}

// Inseré un utilisateur a la bdd \\
function inserUser($pdo, $nom, $prenom, $mail, $tel, $hashMdp){
    $reqInsertUser = $pdo->prepare('INSERT INTO utilisateur(nom, prenom, mail, tel, mdp, role, deleted, id_role) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
    $reqInsertUser->execute([$nom, $prenom, $mail, $tel, $hashMdp, 'client', 0, 3]);
}

// Permet d'inseret l'adresse de l'utilisateur a la base de données \\
function insertAdressUser($pdo, $adresse, $id_ville, $id_user){
    $reqInsertAdressUser = $pdo->prepare('INSERT INTO adresses(adresse, id_ville, id_user) VALUES(?, ?, ?)');
    $reqInsertAdressUser->execute([$adresse, $id_ville, $id_user]);
}
// Recuperation des départements \\
function recupDepartement($pdo){
    $reqRecupDepartement = $pdo->prepare("SELECT * FROM departement");
    $reqRecupDepartement->execute();
    $dep = $reqRecupDepartement->fetchall();
    return $dep;
}
// Récupération des villes des Départements
function recupVillesDept($pdo, $id_departement){
    $reqRecupecupVillesDept = $pdo->prepare('SELECT * FROM ville WHERE id_departement = ?');
    $reqRecupecupVillesDept->execute([$id_departement]);
    $recupVillesDept = $reqRecupecupVillesDept->fetchAll();

    return $recupVillesDept;
}

// Recupération de la ville d'un utilisateur \\
function recupAdresseUsers($pdo, $id_user){
    $reqRecupAdresseUsers = $pdo->prepare("SELECT * FROM adresses WHERE id_user = ?");
    $reqRecupAdresseUsers->execute([$id_user]);
    $adresseUser = $reqRecupAdresseUsers->fetch();
    return $adresseUser;
}
// On récupére les information d'un seul utilisateur \\
function recupInfosUsers($pdo, $id_user){
    $reqRecupInfosUser = $pdo->prepare("SELECT * FROM utilisateur, adresses, departement, ville  WHERE departement.id_departement = ville.id_departement AND ville.id_ville = adresses.id_ville AND adresses.id_user = utilisateur.id_user AND utilisateur.id_user = ?");
    $reqRecupInfosUser->execute([$id_user]);
    $infoUser = $reqRecupInfosUser->fetch();
    return $infoUser;
}


function recupInformationDuDevis($pdo, $id_devis){
    $reqRecupInformationDuDevis = $pdo->prepare('SELECT * FROM devis, utilisateur, liste_prestation, repas_traiteur, adresses, ville, prestation WHERE utilisateur.id_user = devis.id_user AND adresses.id_ville = ville.id_ville AND prestation.id_liste_prestation = liste_prestation.id_liste_prestation AND prestation.id_type_repas = repas_traiteur.id_type_repas AND devis.id_devis = ?');
    $reqRecupInformationDuDevis->execute([$id_devis]);
    $recupInformationDuDevis = $reqRecupInformationDuDevis->fetch();

    return $recupInformationDuDevis;
}

// Recupération des facture du client \\
function recupFactureClient($pdo, $id_user){
    $reqRecupFactureClient = $pdo->prepare("SELECT * FROM facture, devis, utilisateur WHERE facture.id_devis = devis.id_devis AND devis.id_user = utilisateur.id_user AND utilisateur.id_user = ?");
    $reqRecupFactureClient->execute([$id_user]);
    $factureClient = $reqRecupFactureClient->fetchAll();
    return $factureClient;
}
// Récupération des information de la facture de L'utilisateur
function RecupFactureInfosUser($pdo, $id_facture, $id_user){
    $reqRecupFactureInfosUser = $pdo->prepare('SELECT * FROM devis, facture, utilisateur, adresses, ville 
    WHERE devis.id_user = utilisateur.id_user 
    AND utilisateur.id_user = adresses.id_user 
    AND adresses.id_ville = ville.id_ville 
    AND facture.id_facture = ?
    AND utilisateur.id_user = ?');
    $reqRecupFactureInfosUser->execute([$id_facture, $id_user]);
    $recupFactureInfosUser = $reqRecupFactureInfosUser->fetch();
    return $recupFactureInfosUser;
}

// Fonction lié au détail du devis du client \\
function recupInfoDuDevisClient($pdo, $id_facture, $id_user) {
    $reqRecupInfoDuDevisClient = $pdo->prepare("SELECT * FROM devis, facture, liste_prestation, prestation, repas_traiteur, tarif 
    WHERE tarif.id_liste_prestation = liste_prestation.id_liste_prestation 
    AND tarif.id_type_repas = repas_traiteur.id_type_repas 
    AND facture.id_devis = devis.id_devis 
    AND facture.id_facture = ? 
    AND devis.id_user = ? 
    GROUP BY facture.id_devis");
    $reqRecupInfoDuDevisClient->execute([$id_facture, $id_user]);
    $devisClient = $reqRecupInfoDuDevisClient->fetchAll();
    return $devisClient;
}

// 23 traitements fait 
// 34 vue faite
// ==================================================================================\\
// = Fin  Fonction lié a l'inscription et la connexion et au profil de L'utilisateur =\\
// ====================================================================================\\

// ========================================================\\
// = Début Fonction lié aux repas proposer par le traiteur =\\
// ========================================================= \\

function recupListeRepasTraiteur($pdo){
    $reqRecupListeRepasTraiteur = $pdo->prepare("SELECT * FROM repas_traiteur");
    $reqRecupListeRepasTraiteur->execute();
    $ListeRepasTraiteur = $reqRecupListeRepasTraiteur->fetchAll();
    return $ListeRepasTraiteur;
}

function recupListePrestationTraiteur($pdo){
    $reqRecupListePrestationTraiteur = $pdo->prepare("SELECT * FROM liste_prestation");
    $reqRecupListePrestationTraiteur->execute();
    $ListePrestationTraiteur = $reqRecupListePrestationTraiteur->fetchAll();
    return $ListePrestationTraiteur;
}

function recupPrestationTraiteur($pdo, $id_liste_prestation){
    $reqRecupPrestationTraiteur = $pdo->prepare("SELECT * FROM liste_prestation WHERE id_liste_prestation");
    $reqRecupPrestationTraiteur->execute([$id_liste_prestation]);
    $PrestationTraiteur = $reqRecupPrestationTraiteur->fetch();
    return $PrestationTraiteur;
}

function recupIdTypeRepas($pdo, $id_type_repas){
    $reqRecupIdTypeRepas = $pdo->prepare("SELECT * FROM repas_traiteur WHERE id_type_repas = ?");
    $reqRecupIdTypeRepas->execute([$id_type_repas]);
    $idTypeRepas = $reqRecupIdTypeRepas->fetch();
    return  $idTypeRepas;
}

function recupIdRepasTraiteur($pdo, $id_liste_prestation){
    $reqRecupIdRepasTraiteur = $pdo->prepare("SELECT * FROM liste_prestation WHERE id_liste_prestation = ?");
    $reqRecupIdRepasTraiteur->execute([$id_liste_prestation]);
    $idRepasTraiteur = $reqRecupIdRepasTraiteur->fetch();
    return $idRepasTraiteur;
}
// ========================================================\\
// = Fin Fonction lié aux repas proposer par le traiteur   =\\
// ========================================================= \\


// ========================================================================\\
// = Fin Fonction lié a la demande de devis pour lesprestation  traiteur =\\
// ==========================================================================\\
?>