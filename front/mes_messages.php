<?php
require "../backoffice/model/fonctions.php";
$messageExiste = recupInfosMessageReçus($pdo, $id_message);
?>
<section class="intro mt-5 mb-5">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <h1 class="text-center">Mes Messages Reçu</h1>
                <div class="card bg-white">
                    <div class="card-body">
                        <div class="table-responsive">
                            
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Objet</th>
                                        <th scope="col">nom</th>
                                        <th scope="col">mail</th>
                                        <th scope="col">date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($messageExiste as $indice => $msg) {
                                        $indice++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $indice; ?></th>
                                            <td><?php echo $msg['objet_message'] ?></td>
                                            <td><?php echo $msg['nom_message'] . ' ' . $msg['prenom_message'] ?></td>
                                            <td><?php echo $msg['mail_message'] ?></td>
                                            <td><?php echo $msg['date_message'] ?></td>
                                            <td class="d-flex align-items-center">
                                                <form action="../controler/traitement_message_archiver.php" method="post" onsubmit="return confirm('Voulez-vous vraiment Archiver le message ?');">
                                                    <input type="hidden" name="id_message" value="<?php echo $msg['id_message']; ?>">
                                                    <input type="hidden" name="action" value="archiverMessage">
                                                    <button type="submit" class="btn btn-danger btn-sm me-1" data-mdb-toggle="tooltip" title="Refuser le devis">
                                                        <i class="bi bi-archive fs-4"></i>
                                                    </button>
                                                </form>

                                                <form action="../public/index.php?page=24" method="post">
                                                    <input type="hidden" name="id_message" value="<?php echo $msg['id_message']; ?>">
                                                    <input type="hidden" name="action" value="afficher le Message">
                                                    <button type="submit" class="btn btn-primary btn-sm" title="Afficher le Message">
                                                        <i class="bi bi-eye fs-4"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>