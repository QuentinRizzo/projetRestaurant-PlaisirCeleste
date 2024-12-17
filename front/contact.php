<?php
if (isset($_GET['sucess'])) {

    if ($_GET['sucess'] == 'messageEnvoyer') {
        echo '<p class="text-success text-center">Le Message a été envoyer avec succès ! </p>';
    }
}
if (isset($_GET['erreur'])) {

    if ($_GET['erreur'] == 'erreurEnvoiMessage') {
        echo '<p class="Error text-center text-danger">Une erreur est survenu veuillez réesayer ! </p>';
    }
}
?>
<div class="container mt-5 mt-5 box-contact">
    <div class="row bg-dark row-oval">
        <div class="col-lg-6 contact-form background-formulaire" style="background: url('../public/ressource/img/background-section-une.webp') center / cover;">
            <img class="img-fluid mx-auto img-contact d-flex align-items-center" src="../public/ressource/img/logo-plaisirceleste.webp" alt="logo-plaisirceleste">
        </div>
        <div class="col-lg-6 form-content bg-light p-4 formulaire-box-bg bg-dark text-light">

            <h1 class="mb-5 mt-5">Nous Contacter :</h1>

            <form action="../backoffice/controler/traitement_ajout_message.php" method="post">
                <div class="mb-3">
                    <input type="text" name="nomEnvoiMessage" class="form-control" placeholder="Nom" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="prenomEnvoiMessage" class="form-control" placeholder="Prenom" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="mailEnvoiMessage" class="form-control" placeholder="Mail" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="objetEnvoiMessage" class="form-control" placeholder="Objet" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="msgEnvoiMessage" rows="5" placeholder="Message" required></textarea>
                </div>
                <input type="submit" class="btn btn-footer float-end"></input>
            </form>
        </div>
    </div>
</div>