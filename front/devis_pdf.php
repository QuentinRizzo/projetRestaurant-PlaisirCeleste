<?php
session_start();
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

$infosUser = RecupFactureInfosUser($pdo, $id_facture, $_SESSION['idUser']);
$idFacture = $infosUser['id_facture'];

$devis= recupInfoDuDevisClient($pdo, $idFacture, $_SESSION['idUser']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>devis</title>
    <style>
        body {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 10px 20px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .infos {
            width: 100%;
            margin-bottom: 20%;
        }

        .fright {
            float: right;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.8em;
            text-align: center;
            border-top: 1px solid #333;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="infos">
        <div>
            <strong>Émetteur:</strong><br>
            PlaisirCeleste<br>
            29B rue du general Metman<br>
            57070, Metz<br>
            06.45.78.85.64<br>
            agence.PlaisirCeleste.com<br>
        </div>

        <div class="fright">
            <strong>objet Du devis :</strong><br><?php echo htmlspecialchars($infosUser['objet_devis'], ENT_QUOTES, 'UTF-8'); ?><br>
            <strong>Date:</strong> <?php echo date('d-m-Y'); ?><br>
            <strong>Destinataire:</strong><br>
            <?php echo htmlspecialchars($infosUser['nom'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($infosUser['prenom'], ENT_QUOTES, 'UTF-8'); ?><br>
            <?php echo htmlspecialchars($infosUser['adresse'], ENT_QUOTES, 'UTF-8'); ?><br>
            <?php echo htmlspecialchars($infosUser['nom_ville'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($infosUser['code_postal'], ENT_QUOTES, 'UTF-8'); ?><br>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Type de repas</th>
                <th>Type de Prestation</th>
                <th>Nombre de personnes</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($devis as $devi) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($devi['type_repas'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?php echo htmlspecialchars($devi['nom_liste_prestation'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?php echo htmlspecialchars($devi['nb_personne'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?php echo htmlspecialchars($devi['prix_unit'], ENT_QUOTES, 'UTF-8') * htmlspecialchars($devi['nb_personne'], ENT_QUOTES, 'UTF-8'); ?> €</td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                <td><?php $total = $devi['prix_unit'] * $devi['nb_personne']; echo $total; ?> €</td>
            </tr>

        </tbody>

    </table>

    <div class="footer">
        Plaisir Celeste - SIRET: 777 888 999 00022 - Autres informations
    </div>

</body>

</html>