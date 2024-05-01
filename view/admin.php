<style>
    :root {
        --text-color: rgba(34, 42, 66, .7);
        --success-text: #0d6832;
        --primary-text: #273e63;
        --warning-text: #73510d;
        --danger-text: #A61001;
        --success-bg: #d6f0e0;
        --primary-bg: #dfe7f6;
        --warning-bg: #fbf0da;
        --danger-bg: #FFEBE9;
        --primary-btn-text: #3b71ca;
    }

    * {
        /* color:var(--text-color); */
        font-family: 'Open Sans', sans-serif;
        font-family: 'Poppins', sans-serif;
    }

    .main {
        background-color: #f5f6f8bb !important;
        height: 100vh;

    }

    .text-primary {
        color: var(--primary-btn-text) !important;
    }

    .fw-bold {
        font-weight: 500 !important;
    }

    h2 {
        font-weight: 400;
        margin-bottom: unset;

    }

    .action-icon {
        font-size: 1.08rem;
    }

    .badge-success {
        color: var(--success-text) !important;
        background-color: var(--success-bg);
        border: 1px solid;
    }

    .badge-primary {
        color: var(--primary-text) !important;
        ;
        background-color: var(--primary-bg);
        border: 1px solid;
    }

    .badge-warning {
        color: var(--warning-text) !important;
        ;
        background-color: var(--warning-bg);
        border: 1px solid;
    }

    .badge-danger {
        color: var(--danger-text) !important;
        ;
        background-color: var(--danger-bg);
        border: 1px solid;
    }

    .time {
        font-size: .75rem;
    }

    .table-container {
        box-shadow: 0px 1px 2px 0px rgb(60 64 67 / 25%), 0px 2px 6px 2px rgb(60 64 67 / 10%);
        padding: 1rem;
        border-radius: 12px;
        background-color: white;
    }

    th {
        padding: 1rem .5rem !important;
        font-size: .875rem;
        margin-bottom: 1rem !important;
        background-color: white !important;
        color: var(--text-color) !important;
        font-weight: 600 !important;
    }

    th:last-child {
        border-top-right-radius: 12px;
    }

    th:first-child {
        border-top-left-radius: 12px;
    }

    tr td:last-child {
        text-align: right;
    }

    .table>:not(:last-child)>:last-child>* {
        border-bottom-color: rgba(128, 128, 128, 0.277) !important;

    }

    ul {
        margin-bottom: 0rem !important;
    }

    .avatar-span {
        width: 40px;
        height: 40px;
        cursor: pointer;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 20px;
        object-fit: fill;
        background-image: url("https://st4.depositphotos.com/14903220/22197/v/450/depositphotos_221970610-stock-illustration-abstract-sign-avatar-icon-profile.jpg");
    }

    .btn-link {
        font-weight: 500;
        color: var(--primary-text);
        /* border:1px solid #2c58a094 !important; */
        border-radius: 8px;
        text-decoration: underline 0.1em rgb(255, 255, 255) !important;
        text-underline-offset: 0.2em !important;
        transition: text-decoration-color 300ms, text-underline-offset 300ms !important;
    }

    .btn-link:hover {
        text-decoration-color: #0d6efd !important;
        text-underline-offset: 0.4em !important;
    }

    .logout-btn {
        text-decoration: none;
        font-size: 1rem;
    }

    .page-link {
        border: unset !important;
        color: var(--primary-btn-text)
    }
</style>

<!-- //Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<!-- //Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
<!-- fonts -->
<style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap");
</style>
<!-- //Custom Styling -->

<div class="main">
    <div class="container">
        <div class="main-sub row align-items-center pt-5">
        </div>
        <div class="table-container mt-5">
            <div class="mb-2">
                <h2 class="">Liste des binômes</h2>
                <!-- <small class="text-secondary"
                >Les demandes </small
              > -->
            </div>
            <table id="mytable" class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr class="header-row">
                        <th>ID #</th>
                        <th>Etudiant 1</th>
                        <th>classe</th>
                        <th>Etudiant 2</th>
                        <th>classe</th>
                        <th>Date de demande</th>
                        <th>Etat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($binomes as $binome) : ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="fw-bold mb-1"><?= $binome["pfe_id"] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-bold fw-normal mb-1"><?= $binome['nom1'] . " " . $binome['prenom1'] ?></p>
                            </td>
                            <td>
                                <?= $binome['classe1'] ?>
                            </td>
                            <td>
                                <p class="fw-bold fw-normal mb-1"><?= $binome['nom2'] . " " . $binome['prenom2'] ?></p>
                            </td>
                            <td>
                                <?= $binome['classe2'] ?>
                            </td>


                            <td>
                                <div class="">
                                    <span class=""><?php echo date("Y-m-d",  strtotime($binome['DateD']));  ?></span>
                                    <p class="time text-muted mb-0">
                                        <?php echo date("h:i",  strtotime($binome['DateD']));  ?> <span class="fw-bold">am</span>
                                    </p>
                                </div>
                            </td>
                            <td>
                                <?php
                                switch ($binome['validite']) {
                                    case 0: {
                                            echo "<span class='badge badge-warning rounded-pill d-inline'>Encours</span>";
                                            break;
                                        }
                                    case 1: {
                                            echo "<span class='badge badge-success rounded-pill d-inline'>Acceptée</span>";
                                            break;
                                        }
                                    case -1: {
                                            echo "<span class='badge badge-danger rounded-pill d-inline'>Refusée</span>";
                                            break;
                                        }
                                }
                                ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-link btn-sm btn-rounded text-primary">
                                    <i class="me-1 action-icon bi bi-file-earmark-richtext text-primary"></i>
                                    <a href="binomes.php?pfe_id=<?php echo $binome['pfe_id']; ?>" class="btn-link">Afficher</a>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>