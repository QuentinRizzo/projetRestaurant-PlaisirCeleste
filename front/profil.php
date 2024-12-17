<?php
$user = recupInfosUsers($pdo, $_SESSION['idUser']);
?>

<div class="col py-3">
    <div class="container mt-5">

        <div class="form h-100 feuille-contact">

            <h3 class="text-center mb-5 mt-5">Mes informations personnelles</h3>


            <form class="mb-5" method="post" id="contactForm" name="contactForm">

                <div class="row">
                    <div class="col-md-6 form-group mb-5">
                        <label for="name" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Votre nom" value="<?php echo htmlspecialchars($user['nom'], ENT_QUOTES, 'UTF-8') ?>">
                    </div>

                    <div class="col-md-6 form-group mb-5">
                        <label for="prenom" class="col-form-label">Prénom :</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prénom" value="<?php echo htmlspecialchars($user['prenom'], ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group mb-5">
                        <label for="mail" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" name="mail" id="mail" placeholder="Votre Adresse Mail" value="<?php echo htmlspecialchars($user['mail'], ENT_QUOTES, 'UTF-8') ?>">
                    </div>

                    <div class="col-md-6 form-group mb-5">
                        <label for="tel" class="col-form-label">Tel:</label>
                        <input type="text" class="form-control" name="tel" id="tel" placeholder="Votre Numéro de téléphone" value="<?php echo htmlspecialchars($user['tel'], ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group mb-5">
                        <label for="ville" class="col-form-label">Ville :</label>
                        <input type="text" class="form-control" name="ville" id="ville" placeholder="Votre Ville" value="<?php echo htmlspecialchars($user['nom_ville'], ENT_QUOTES, 'UTF-8') ?>">
                    </div>

                    <div class="col-md-6 form-group mb-5">
                        <label for="adresse" class="col-form-label">Adresse :</label>
                        <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Votre Adresse" value="<?php echo htmlspecialchars($user['adresse'], ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 me-5 form-group d-flex justify-content-end">
                        <input type="submit" value="Enregistrer" class="btn-footer mx-auto h-100">
                        <span class="submitting"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12  mt-5 form-group d-flex justify-content-end btn-footer mx-auto h-100">
                        <a href="../public/index.php?page=6" class="nav-link mx-auto text-light">Mes Demandes de devis</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
