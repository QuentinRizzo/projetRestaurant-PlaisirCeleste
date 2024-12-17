<!DOCTYPE html>
<html  lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez notre restaurant traiteur gastronomique, offrant une expérience culinaire exquise avec des plats raffinés et des saveurs exceptionnelles. Plongez dans un univers de délices gustatifs et de service impeccable. Réservez une table dès maintenant et savourez une expérience gastronomique inoubliable.">
    <title>Restaurant Traiteur Plaisir-Celeste</title>
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../public/ressource/css/style.css">
</head>


<body>
    <?php
    session_start();
    include('../front/header.php');

    if (isset($_GET['page'])) {
        if ($_GET['page'] == 1) {
            include "../front/carte_bar.php";
        }
        if ($_GET['page'] == 2) {
            include "../front/carte_repas.php";
        }
        if ($_GET['page'] == 3) {
            include "../front/devis.php";
        }
        if ($_GET['page'] == 4) {
            include "../front/contact.php";
        }
        if ($_GET['page'] == 5) {
            include "../front/profil.php";
        }
        if ($_GET['page'] == 6) {
            include "../front/mes_devis.php";
        }
        if ($_GET['page'] == 7) {
            include "../front/mes_messages.php";
        }

    } else {
        include "../front/accueil.php";
    }

    include('../front/footer.php');
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../public/ressource/js/script.js"></script>
</body>
</html>