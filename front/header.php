<?php
require "../model/fonctions.php";
require "../model/connexion_bdd.php";

$departements = recupDepartement($pdo);
?>
<header>

    <!-- Vue par les utilisateurs connecter -->
    <?php
    if (isset($_SESSION['idUser'])) {
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bordernav">
            <a class="navbar-brand" href="#">
                <img src="../public/ressource/img/logo-plaisirceleste.webp" class="img-fluid logo mx-2 logo-barnav" alt="Logo-PlaisirCeleste">
            </a>

            <!-- Bouton du menu hamburger -->
            <button class="navbar-toggler btn-bg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link mt-5 text-light" href="../public/index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link mt-5 text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cartes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../public/index.php?page=1">Carte du Bar</a></li>
                            <li><a class="dropdown-item" href="../public/index.php?page=2">Carte Repas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mt-5 text-light" href="../public/index.php?page=3">Demande Devis</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mt-5 text-light" href="../public/index.php?page=4">Contact</a>
                    </li>
                </ul>

                <?php
                if ($_SESSION['idRoleUser'] == 1) {
                ?>
                    <ul class="navbar-nav mx-4">
                        <li class="nav-item">
                            <a href="#" class="mx-5 d-flex align-items-center justify-center text-white text-decoration-none dropdown-toggle mt-5" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../public/ressource/img/logo-plaisirceleste.webp" alt="hugenerd" width="80" height="80" class="rounded-circle" style="float: right;">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow text-center dropdown-modif">
                                <li><a class="dropdown-item" href="../backoffice/public/index.php?page=1">Administration</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../controler/traitement_deconnexion.php">Deconnexion</a></li>
                            </ul>
                        </li>
                    </ul>



                <?php } else { ?>
                    <ul class="navbar-nav mx-4">
                        <li class="nav-item">
                            <a href="#" class="mx-5 d-flex align-items-center justify-center text-white text-decoration-none dropdown-toggle mt-5" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../public/ressource/img/logo-plaisirceleste.webp" alt="hugenerd" width="80" height="80" class="rounded-circle" style="float: right;">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow text-center dropdown-modif">
                                <li><a class="dropdown-item" href="../public/index.php?page=5">Mon Profil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../controler/traitement_deconnexion.php">Deconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>
            <?php
        } else {
            ?>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark bordernav">
                    <a class="navbar-brand" href="#">
                        <img src="../public/ressource/img/logo-plaisirceleste.webp" class="img-fluid logo mx-2 logo-barnav" alt="Logo-PlaisirCeleste">
                    </a>

                    <!-- Bouton du menu hamburger -->
                    <button class="navbar-toggler btn-bg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link mt-5 text-light" href="../public/index.php">Accueil</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle nav-link mt-5 text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Cartes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../public/index.php?page=1">Carte du Bar</a></li>
                                    <li><a class="dropdown-item" href="../public/index.php?page=2">Carte Repas</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mt-5 text-light" href="../public/index.php?page=3">Demande Devis</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link mt-5 text-light" href="../public/index.php?page=4">Contact</a>
                            </li>

                        </ul>

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="d-flex align-items-center text-light">
                                    <button type="button" class="nav-link text-light mt-5" data-bs-toggle="modal" data-bs-target="#ModalConnexion">
                                        <i class="bi bi-person fs-3 mx-3 nav-icon"></i> Connexion
                                    </button>

                                    <button type="button" class="nav-link text-light mt-5" data-bs-toggle="modal" data-bs-target="#ModalInscription">
                                        <i class="bi bi-person-plus fs-3 mx-3 nav-icon"></i> Inscription
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

            <?php } ?>
            <!-- Début Nav -->
</header>
<!-- Fin Nav -->

<!-- Début  Modal connexion -->
<div class="modal fade " id="ModalConnexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content bg-modal">
            <div class="modal-body">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 feuille-contact w-100">
                            <h3 class="text-center mb-5 mt-5">Connexion</h3>
                            <form class="mb-5" id="loginForm" name="loginForm" method="post" action="../controler/traitement_connexion.php">
                                <div class="mb-3 position-relative">
                                    <input type="email" class="form-control" name="mailConnexion" id="email" placeholder="Email" autocomplete="off">
                                </div>
                                <div class="mb-3 position-relative">
                                    <div class="input-group mdpforjs">
                                        <input class="afficher form-control" type="password" name="mdpConnexion" id="coPassword" placeholder="Mot de passe" autocomplete="current-password">
                                        <button class="btn btn-outline-secondary bi bi-eye affichage" type="button" id="co"></button>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberPassword" autocomplete="off">
                                        <label class="checkbox" for="rememberPassword">Enregistrer le mot de passe</label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-5">
                                    <button type="button" class="nav-link text-light " data-bs-toggle="modal" data-bs-target="#ModalInscription">Pas encore de compte ?</button>
                                    <a href="#" class="nav-link float-end text-decoration-none">Mot de passe oublié ?</a>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn-footer mx-auto mt-5" name="btn">Se connecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================================================================================== -->

<!-- Début Modal Inscription-->
<div class="modal fade" id="ModalInscription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-modal">
            <div class="modal-body">
                <div class="container mt-5">
                    <div class="row mx-auto">
                        <div class="form h-100 feuille-contact">
                            <h3 class="text-center mb-5 mt-5">Inscription</h3>
                            <form class="mb-5" method="post" action="../controler/traitement_inscription.php" id="formInscription" name="formInscription">

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="nomInscription" class="col-form-label">Nom :</label>
                                        <input type="text" class="form-control" name="nomInscription" id="nomInscription" placeholder="Votre nom" autocomplete="off">
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="prenomInscription" class="col-form-label">Prénom :</label>
                                        <input type="text" class="form-control" name="prenomInscription" id="prenomInscription" placeholder="Votre prénom" autocomplete="off">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="mailInscription" class="col-form-label">Email :</label>
                                        <input type="text" class="form-control" name="mailInscription" id="mailInscription" placeholder="Votre Email" autocomplete="off">
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="telInscription" class="col-form-label">Tel :</label>
                                        <input type="text" class="form-control" name="telInscription" id="telInscription" placeholder="Votre Tel" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="adresseInscription" class="col-form-label">Adresse :</label>
                                        <input type="text" class="form-control" name="adresseInscription" id="adresseInscription" placeholder="Votre Adresse" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <select name="departement" id="departement" class="form-select" aria-label="Default select example">
                                            <option value="">choix du département</option>
                                            <?php foreach ($departements as $dept) { ?>
                                                <option value="<?php echo $dept['id_departement'] ?>"><?php echo $dept['nom_departement'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <select class="form-select" name="ville" id="ville">
                                            <option value="">Choix de vôtre ville</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="coInscriptionPassword" class="col-form-label">Mot de passe :</label>
                                        <div class="input-group mdpforjs">
                                            <input class="afficher form-control" type="password" name="mdpInscription" id="coInscriptionPassword" placeholder="Mot de passe" autocomplete="new-password">
                                            <button class="btn btn-outline-secondary bi bi-eye affichage" type="button" id="coInscription"></button>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="coInscriptionConfirmPassword" class="col-form-label">Confirmer le mot de passe :</label>
                                        <div class="input-group mdpforjs">
                                            <input class="afficher form-control" type="password" name="mdpInscriptionConfirm" id="coInscriptionConfirmPassword" placeholder="Confirmer le mot de passe" autocomplete="new-password">
                                            <button class="btn btn-outline-secondary bi bi-eye affichage" type="button" id="coInscriptionConfirm"></button>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="d-grid d-flex align-items-center justify-content-center flex-column">
                                        <button type="submit" class="btn-footer mx-auto mt-5 mb-2" name="btnInscription" id="btnInscription">Valider</button>
                                        <button type="button" class="nav-link text-light" data-bs-toggle="modal" data-bs-target="#ModalConnexion">Vous avez déjà un compte?</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======================================================================= -->

<!--Début  Slider -->

<div class="contenaire-slide">

    <div class="carousel-indicators">
        <button class="dote-slider" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button class="dote-slider" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button class="dote-slider" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="slide active">
        <div class="blur" style="background:url(../public/ressource/img/bg-header.webp) center/cover;"></div>
        <div class="box-img-slide">
            <img class="img-slider" src="../public/ressource/img/image-slider.webp" alt="assiette-slider">
        </div>

        <div class="desc-slide">
            <h1 class="text-center">Plaisir Céleste</h1>
            <p>Bienvenue chez Plaisir Céleste, un paradis gastronomique où les saveurs exquises rencontrent l'élégance culinaire. Notre restaurant traiteur, véritable
                hymne à la délectation des sens, vous invite à un voyage gustatif inoubliable. Dans un cadre raffiné et apaisant,
                notre équipe de chefs passionnés marie avec virtuosité les produits les plus frais et les techniques culinaires les plus fines pour
                vous offrir une expérience gustative d'exception. Chaque plat est une invitation à un voyage sensoriel,
            </p>
        </div>

        <a href="#" class="btn-voir-detail">Voir detail</a>

    </div>

    <div class="slide">
        <div class="blur" style="background:url(../public/ressource/img/bg-header.webp) center/cover;"></div>
        <div class="box-img-slide">
            <img class="" src="../public/ressource/img/image-slider-deux.webp" alt="image-slider-deux">
        </div>
        <div class="desc-slide">
            <h1 class="text-center">Carte du Bar</h1>
            <p>
                Des boissons exquises, des cocktails artisanaux et spiritueux de qualité, ainsi qu'une sélection soignée de vins et de bières.
                Une expérience de dégustation incomparable vous attend. Les amateurs de cocktails apprécieront nos créations uniques,
                mettant en avant des saveurs audacieuses et des ingrédients frais. Si vous préférez le classique, nos mixologues expérimentés
                seront ravis de préparer vos cocktails favoris. Notre large choix de bières artisanales locales et internationales,
                ainsi que notre cave à vins bien garnie, garantissent une option pour chaque client.
            </p>
        </div>
        <a href="#" class="btn-voir-detail">Voir detail</a>
    </div>

    <div class="slide">
        <div class="blur" style="background:url(../public/ressource/img/bg-header.webp) center/cover;"></div>
        <div class="box-img-slide">
            <img class="" src="../public/ressource/img/image-slider-trois.webp" alt="image-slider-trois">
        </div>
        <div class="desc-slide">
            <h1 class="text-center">Carte Repas</h1>
            <p>
                Notre carte gastronomique étoilée propose une palette raffinée de plats français exquis pour combler tous les amateurs de cuisine haut de gamme.
                Des créations culinaires élégantes mettant en avant la richesse de la gastronomie française aux délices classiques revisités,
                notre établissement offre une expérience gastronomique d'exception. Pour les fins gourmets en quête de saveurs audacieuses,
                nos chefs ont élaboré des créations uniques mettant en valeur des ingrédients frais et de qualité
            </p>
        </div>
        <a href="#" class="btn-voir-detail">Voir detail</a>
    </div>

    <div class="cont-but">
        <i class="bi bi-chevron-left suivant mx-5"></i>
        <i class="bi bi-chevron-right precedent mx-5"></i>
    </div>
</div>

<!-- Fin Slider -->