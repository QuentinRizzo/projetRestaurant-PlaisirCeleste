<?php
require "../model/connexion_bdd.php";

if (isset($_SESSION['idUser'])) {
    $user = recupInfoAllUser($pdo, $_SESSION['idUser']);
    $repasTraiteur = recupListeRepasTraiteur($pdo);
    $prestationTraiteur = recupListePrestationTraiteur($pdo);
?>
    <form action="../backoffice/controler/traitement_ajout_devis.php" method="post">
        <div class="container mt-5">
            <div class="row mx-auto">
                <div class="form h-100 feuille-contact">
                    <h3 class="text-center mb-5 mt-5">Demander un Devis</h3>
                    <?php
                    if (isset($_GET['sucess'])) {

                        if ($_GET['sucess'] == 'devisEnvoyer') {
                            echo '<p class="text-success text-center">Le Devis a été envoyer avec succès ! </p>';
                        }
                    }
                    if (isset($_GET['erreur'])) {

                        if ($_GET['erreur'] == 'erreurEnvoiDevis') {
                            echo '<p class="Error text-center text-danger">Une erreur est survenu veuillez réesayer ! </p>';
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12 form-group mb-3">
                            <label for="objet_devis" class="col-form-label">Objet du devis :</label>
                            <input type="text" class="form-control" name="objetdevis" id="objet_devis" placeholder="saisir l'objet exemple : (devis mariage)" autocomplete="off">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="nomdevis" class="col-form-label">Nom :</label>

                            <input type="text" class="form-control" name="nomdevis" id="nomdevis" value="<?php echo $user['nom'] ?>" autocomplete="off">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="prenomdevis" class="col-form-label">Prénom :</label>

                            <input type="text" class="form-control" name="prenomdevis" id="prenomdevis" value="<?php echo $user['prenom'] ?>" autocomplete="off">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="maildevis" class="col-form-label">Email :</label>

                            <input type="text" class="form-control" name="maildevis" id="maildevis" value="<?php echo $user['mail'] ?>" autocomplete="off">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="teldevis" class="col-form-label">Tel :</label>

                            <input type="text" class="form-control" name="teldevis" id="teldevis" value="<?php echo $user['tel'] ?>" autocomplete="off">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="adresseDevis" class="col-form-label">Adresse :</label>

                            <input type="text" class="form-control" name="adresseDevis" id="adresseDevis" placeholder="Votre Adresse" autocomplete="off">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="villeDevis" class="col-form-label">Ville :</label>

                            <input type="text" class="form-control" name="villeDevis" id="villeDevis" placeholder="Votre Ville" autocomplete="off">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="type_repas" class="col-form-label">Type de repas :</label>
                            <select name="choix_repas" class="form-select" aria-label="Default select example">
                                <option selected>Choisir le type de repas</option>
                                <?php foreach ($repasTraiteur as $rt) { ?>
                                    <option value="<?php echo $rt['id_type_repas'] ?>"><?php echo $rt['type_repas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="prestation" class="col-form-label">Choix Prestation :</label>
                            <select name="choix_prestation" class="form-select" aria-label="Default select example">
                                <option selected>Choisir la Prestation</option>
                                <?php foreach ($prestationTraiteur as $presta) { ?>
                                    <option value="<?php echo $presta['id_liste_prestation'] ?>"><?php echo $presta['nom_prestation'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="nombre_personnes" class="col-form-label">Nombre de personnes :</label>
                            <input type="text" class="form-control" name="nbPersDevis" id="nombre_personnes" placeholder="Nombre de personnes" autocomplete="off">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="date_evenement" class="col-form-label">Date de l’évènement :</label>
                            <input type="date" class="form-control" name="date_evenement" id="date_evenement" placeholder="Date de l’évènement" autocomplete="off">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group mb-3">
                            <label for="commentaire" class="col-form-label">Commentaire supplémentaire :</label>
                            <textarea class="form-control" name="commentaireDevis" id="commentaire" placeholder="Commentaire supplémentaire"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-grid d-flex align-items-center justify-content-center flex-column">
                            <button type="submit" class="btn-footer mx-auto mt-5 mb-2" name="btndevis" id="btndevis">Envoyer</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
<?php } else {


?>

    <div class="row">
        <div class="d-grid d-flex align-items-center justify-content-center flex-column">
            <h2 class="text-center text-danger">Veuillez vous connecter pour afficher le formulaire</h2>
            <button type="button" class="nav-link text-light mt-5 bg-dark btn-footer" data-bs-toggle="modal" data-bs-target="#ModalConnexion">Connexion</button>
            <button type="button" class="nav-link text-light mt-5 bg-dark btn-footer" data-bs-toggle="modal" data-bs-target="#ModalInscription">Inscription</button>
        </div>
    </div>
<?php } ?>